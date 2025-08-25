<?php

use Illuminate\Http\JsonResponse;
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

    if ($status === 'success') {
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
        return buildResponse('success', $result, 'Sucessfully Created', 201);
    } catch (Exception $e) {
        return buildResponse('error', null, $e->getMessage(), 500);
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
            return buildResponse('error', null, 'Record not found', 404);
        }

        // Handle file replacement
        if ($fileField && isset($data[$fileField]) && $model->$fileField && File::exists(public_path($model->$fileField))) {
            File::delete(public_path($model->$fileField));
        }

        $updated = $model->update($data);

        return $updated
            ? buildResponse('success', $model->fresh(), 'Succefully Updated')
            : buildResponse('error', null, 'Failed to update the record', 500);
    } catch (Exception $e) {
        return buildResponse('error', null, $e->getMessage(), 500);
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

        return $deleted ? buildResponse('success') : buildResponse('error', null, 'Unable to delete record', 500);
    } catch (Exception $e) {
        return buildResponse('error', null, $e->getMessage(), 500);
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
