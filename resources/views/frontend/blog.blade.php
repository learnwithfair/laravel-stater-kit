@extends('layouts.app2')

@section('main-content')
    <!-- Services Hero area started -->
    <section class="blog-hero-img">
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-12 col-md-11 mx-auto px-5">
                    <div class="ptop d-none d-md-block">
                        <h1 class="text-h1 quaternary-color">Insights from the Wordsmiths at EdenProse</h1>
                        <p class="quaternary-color body-text-two">From ideation to impact, EdenProse nurtures your
                            narrative with top-quality content writing services. Our seasoned writers craft engaging,
                            SEO-enhanced content that cultivates your brand's influence and drives real results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Hero area ended -->


    <!-- all blogs area started -->
    <section class="py-5 px-3">
        <h2 class="text-center text-h2 mb-5">All Blogs</h2>

        <div class="container">
            <div class="row justify-content-center">

                <!-- Search Input -->
                <div class="col-6 col-md-6 mb-2">
                    <div class="input-group rounded border">
                        <input type="text" class="form-control border-0" placeholder="Search a blog..." />
                        <span class="input-group-text bg-transparent border-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                    </div>
                </div>

                <!-- Sort Dropdown -->
                <div class="col-6 col-md-6 mb-2 d-flex align-items-center justify-content-md-end">
                    <label for="sortSelect" class="me-2 mb-0">Sort by:</label>
                    <select class="form-select rounded w-auto" id="sortSelect">
                        <option selected>Most Popular</option>
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>


                <div class="row g-2 g-md-4" id="blogContainer">

                    <!-- Repeat this col for each blog card -->
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-design shadow-sm">
                            <div class="row g-0">

                                <!-- Image -->
                                <div class="blog-post-image">
                                    <img src="assets/img/blog-post-1.png" class="img-fluid h-100 w-100 object-fit-cover"
                                        alt="Blog Image">
                                </div>

                                <!-- Content -->
                                <div class="p-3">
                                    <small class="body-text-three secondary-color mb-1">08-11-2024 &nbsp;&nbsp;
                                        Category</small>
                                    <h6 class="button-one mb-2">Lorem ipsum dolor sit amet</h6>
                                    <p class="body-text-two secondary-color flex-grow-1">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div>
                                        <a href="#" class="button-one view-btn">View</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Repeat this col for each blog card -->
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-design shadow-sm">
                            <div class="row g-0">

                                <!-- Image -->
                                <div class="blog-post-image">
                                    <img src="assets/img/blog-post-1.png" class="img-fluid h-100 w-100 object-fit-cover"
                                        alt="Blog Image">
                                </div>

                                <!-- Content -->
                                <div class="p-3">
                                    <small class="body-text-three secondary-color mb-1">08-11-2024 &nbsp;&nbsp;
                                        Category</small>
                                    <h6 class="button-one mb-2">Lorem ipsum dolor sit amet</h6>
                                    <p class="body-text-two secondary-color flex-grow-1">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div>
                                        <a href="#" class="button-one view-btn">View</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Repeat this col for each blog card -->
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-design shadow-sm">
                            <div class="row g-0">

                                <!-- Image -->
                                <div class="blog-post-image">
                                    <img src="assets/img/blog-post-1.png" class="img-fluid h-100 w-100 object-fit-cover"
                                        alt="Blog Image">
                                </div>

                                <!-- Content -->
                                <div class="p-3">
                                    <small class="body-text-three secondary-color mb-1">08-11-2024 &nbsp;&nbsp;
                                        Category</small>
                                    <h6 class="button-one mb-2">Lorem ipsum dolor sit amet</h6>
                                    <p class="body-text-two secondary-color flex-grow-1">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div>
                                        <a href="#" class="button-one view-btn">View</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Repeat this col for each blog card -->
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-design shadow-sm">
                            <div class="row g-0">

                                <!-- Image -->
                                <div class="blog-post-image">
                                    <img src="assets/img/blog-post-1.png" class="img-fluid h-100 w-100 object-fit-cover"
                                        alt="Blog Image">
                                </div>

                                <!-- Content -->
                                <div class="p-3">
                                    <small class="body-text-three secondary-color mb-1">08-11-2024 &nbsp;&nbsp;
                                        Category</small>
                                    <h6 class="button-one mb-2">Lorem ipsum dolor sit amet</h6>
                                    <p class="body-text-two secondary-color flex-grow-1">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div>
                                        <a href="#" class="button-one view-btn">View</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Repeat this col for each blog card -->
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-design shadow-sm">
                            <div class="row g-0">

                                <!-- Image -->
                                <div class="blog-post-image">
                                    <img src="assets/img/blog-post-1.png" class="img-fluid h-100 w-100 object-fit-cover"
                                        alt="Blog Image">
                                </div>

                                <!-- Content -->
                                <div class="p-3">
                                    <small class="body-text-three secondary-color mb-1">08-11-2024 &nbsp;&nbsp;
                                        Category</small>
                                    <h6 class="button-one mb-2">Lorem ipsum dolor sit amet</h6>
                                    <p class="body-text-two secondary-color flex-grow-1">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div>
                                        <a href="#" class="button-one view-btn">View</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Repeat this col for each blog card -->
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-design shadow-sm">
                            <div class="row g-0">

                                <!-- Image -->
                                <div class="blog-post-image">
                                    <img src="assets/img/blog-post-1.png" class="img-fluid h-100 w-100 object-fit-cover"
                                        alt="Blog Image">
                                </div>

                                <!-- Content -->
                                <div class="p-3">
                                    <small class="body-text-three secondary-color mb-1">08-11-2024 &nbsp;&nbsp;
                                        Category</small>
                                    <h6 class="button-one mb-2">Lorem ipsum dolor sit amet</h6>
                                    <p class="body-text-two secondary-color flex-grow-1">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div>
                                        <a href="#" class="button-one view-btn">View</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="pt-4 d-flex align-items-center justify-content-center">
                    <a href="javascript:void(0);" class="body-text-three load" onclick="loadMoreCards()">Load More</a>
                </div>

                <!-- JavaScript: Load More Functionality -->
                <script>
                    function loadMoreCards() {
                        const blogContainer = document.getElementById("blogContainer");
                        let cardsToAdd = "";

                        for (let i = 0; i < 6; i++) {
                            cardsToAdd += `
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-design shadow-sm">
                            <div class="row g-0">

                                <!-- Image -->
                                <div class="blog-post-image">
                                    <img src="assets/img/blog-post-1.png" class="img-fluid h-100 w-100 object-fit-cover"
                                        alt="Blog Image">
                                </div>

                                <!-- Content -->
                                <div class="p-3">
                                    <small class="body-text-three secondary-color mb-1">08-11-2024 &nbsp;&nbsp;
                                        Category</small>
                                    <h6 class="button-one mb-2">Lorem ipsum dolor sit amet</h6>
                                    <p class="body-text-two secondary-color flex-grow-1">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <div>
                                        <a href="#" class="button-one view-btn">View</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
        `;
                        }

                        // Append the new cards at the end
                        blogContainer.insertAdjacentHTML("beforeend", cardsToAdd);
                    }
                </script>


            </div>



        </div>
    </section>
    <!-- all blogs area ended -->
@endsection
@push('scripts')
@endpush
