<?php

use Illuminate\Http\JsonResponse;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

// Nav menu active color
function menuActive($routeName)
{
    $class = 'active';

    if (is_array($routeName)) {
        foreach ($routeName as $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}


/**
 * Response builder with consistent structure.
 *
 * @param string $status Success or error status.
 * @param mixed $data The data to return.
 * @param int $statusCode HTTP status code.
 * @return JsonResponse
 */
function buildResponse(string $status, $data = null, $message = null, int $statusCode = 200): JsonResponse
{
    $response = [];

    if ($status === 'success' ) {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data,
            'code' => $statusCode
        ];
    } elseif ($status === 'error') {

        $response = [
            'status' => false,
            'message' => $message,
            'data' => $data ?? 'Server Error',
            'code' => $statusCode
        ];
    }

    return response()->json($response, $statusCode);
}

/**
 * Helper function to create a model and return a JSON response.
 *
 * @param string $modelClass The model class to create.
 * @param array $data The data to pass to the create method.
 * @return JsonResponse
 */
function createAndRespond(string $modelClass, array $data): JsonResponse
{
    try {
        $result = $modelClass::create($data);
        return buildResponse('success', $result,'Sucessfully Created',201);
    } catch (Exception $e) {
        return buildResponse('error', null ,$e->getMessage(), 500);
    }
}
/**
 * Update a model and respond with a JSON response.
 * Optionally deletes the old file if a new one is provided.
 *
 * @param string $modelClass The model class to update.
 * @param array $data The data to update.
 * @param int|string $id The ID of the record to update.
 * @param string|null $fileField Optional file field to replace and delete old file.
 * @return JsonResponse
 */
function updateAndRespond(string $modelClass, array $data, $id, ?string $fileField = null): JsonResponse
{
    try {
        $model = $modelClass::find($id);

        if (! $model) {
            return buildResponse('error', null,'Record not found', 404);
        }

        // Handle file replacement
        if ($fileField && isset($data[$fileField]) && $model->$fileField && File::exists(public_path($model->$fileField))) {
            File::delete(public_path($model->$fileField));
        }

        $updated = $model->update($data);

        return $updated
            ? buildResponse('success', $model->fresh(),'Succefully Updated')
            : buildResponse('error', null,'Failed to update the record', 500);
    } catch (Exception $e) {
        return buildResponse('error', null,$e->getMessage(), 500);
    }
}

/**
 * Deletes a record by ID or key from a model class and optionally deletes a file.
 *
 * @param string $modelClass The model class to delete from.
 * @param int|string $id The ID of the record to delete.
 * @param string $key The key to use for deletion, defaults to 'id'.
 * @param string|null $fileField Optional file field to delete from public folder.
 * @return JsonResponse
 */
function deleteById(string $modelClass, $id, ?string $fileField = null, string $key = 'id',): JsonResponse
{
    try {
        $model = $modelClass::where($key, $id)->first();

        if (! $model) {
            return buildResponse('error', 'Record not found', 404);
        }

        // Delete file if field and file exist
        if ($fileField && $model->$fileField && File::exists(public_path($model->$fileField))) {
            File::delete(public_path($model->$fileField));
        }

        $deleted = $model->delete();

        return $deleted ? buildResponse('success') : buildResponse('error', null,'Unable to delete record', 500);
    } catch (Exception $e) {
        return buildResponse('error', null,$e->getMessage(), 500);
    }
}

/**
 * Send a custom JSON response using standard structure.
 *
 * @param mixed $data The data to send as the response data.
 * @param bool $success Whether the response indicates success or error.
 * @param int $statusCode HTTP status code (default: 200 for success, 500 for error).
 * @return JsonResponse
 */
function sendRespond($data): JsonResponse
{

    return buildResponse('success', $data);
}

/**
 * Upload a file to the specified folder within public directory.
 *
 * @param UploadedFile $file The uploaded file instance.
 * @param string $folder Folder path relative to the `public` directory.
 * @param string|null $customName Optional custom file name without extension.
 * @return string|null Relative file path or null on failure.
 */
function uploadFile(UploadedFile $file, string $folder, ?string $customName = null): ?string
{
    try {
        $folderPath = public_path($folder);

        if (! File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }

        $fileName = $customName
            ? $customName . '.' . $file->getClientOriginalExtension()
            : time() . '.' . $file->getClientOriginalExtension();

        $file->move($folderPath, $fileName);

        return '/' . trim($folder, '/') . '/' . $fileName;
    } catch (Exception $e) {

        return null;
    }
}

###########################


/**
 * Upload to Public Folder
 * Upload an image and return its URL.
 *
 * @param  \Illuminate\Http\UploadedFile  $image
 * @param  string  $directory
 * @return string
 */
function uploadImage($file, $folder)
{
    if (!$file->isValid()) {
        return null;
    }

    $imageName = Str::slug(time()) . rand() . '.' . $file->extension();
    $path      = public_path('uploads/' . $folder);
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    $file->move($path, $imageName);
    return 'uploads/' . $folder . '/' . $imageName;
}


/**
 * Upload to Storage Folder
 * Store a file in the specified folder within Laravel's storage directory and return its path.
 *
 * @return string
 */
function storeFile($file, $folder)
{
    if (!$file->isValid()) {
        return null;
    }

    // Generate a unique file name
    $fileName = Str::slug(time() . '-' . uniqid()) . '.' . $file->getClientOriginalExtension();

    // Store the file in the specified folder within the storage/app directory
    $filePath = $file->storeAs($folder, $fileName, 'public');

    // Return the file path for reference
    return 'storage/' . $filePath; // e.g., "folder/filename.extension"
}


/**
 * Delete an image and return a boolean.
 *
 * @param  string  $imageUrl
 * @return bool
 */
function deleteImage($imageUrl)
{
    try {
        // Check if $imageUrl is a valid string
        if (is_string($imageUrl) && !empty($imageUrl)) {
            // Extract the relative path from the URL
            $parsedUrl = parse_url($imageUrl);
            $relativePath = $parsedUrl['path'] ?? '';

            // Remove the leading '/storage/' from the path
            $relativePath = preg_replace('/^\/?storage\//', '', $relativePath);

            // Check if the image exists
            if (Storage::disk('public')->exists($relativePath)) {
                // Delete the image if it exists
                Storage::disk('public')->delete($relativePath);
                return true;
            } else {
                // Return false if the image does not exist
                return false;
            }
        } else {
            // Return false if $imageUrl is not a valid string
            return false;
        }
    } catch (Exception $e) {
        // Handle any other exceptions
        return false;
    }
}



/**
 * Generate a unique slug for the given model and title.
 *
 * @param string $title
 * @param string $table
 * @param string $slugColumn
 * @return string
 */
function generateUniqueSlug($title, $table, $slugColumn = 'slug')
{
    // Generate initial slug
    $slug = str::slug($title);

    // Check if the slug exists
    $count = DB::table($table)->where($slugColumn, 'LIKE', "$slug%")->count();

    // If it exists, append the count
    return $count ? "{$slug}-{$count}" : $slug;
}


/**
 * Generate a unique 10-character SKU for a user based on timestamp and random string,
 * ensuring it does not already exist in the specified table.
 *
 * @param int $userId The user ID for whom the SKU is generated.
 * @param string $tableName The name of the table in which to check for SKU uniqueness.
 * @return string The generated SKU.
 */
function generateUniqueSKU($table, $column, $length = 10)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);

    do {
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // Check if SKU is already present in the table
        $exists = DB::table($table)->where($column, $randomString)->exists();
    } while ($exists);

    return $randomString;
}
