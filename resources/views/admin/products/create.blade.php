@extends('admin.layouts.main')

@section('content')
    <section class="content-start max-w-3xl w-full gap-8 flex flex-col ">
        <h2 class="text-3xl font-bold text-gray-800">Create New Product</h2>
        <div class="flex flex-col gap-4 pb-12">
            <h4 class="text-xl font-semibold text-gray-800">Images: </h4>
            <div>
                <div id="image-container" class=" flex flex-row flex-wrap gap-8 content-start justify-start w-full">
                    <div onclick="triggerFileInput()"
                        class="w-40 h-40 rounded overflow-hidden shadow-lg bg-slate-400 text-center items-center content-center hover:cursor-pointer">
                        <i class="fa-solid fa-plus fa-2xl"></i>
                    </div>

                    <input type="file" class="form-control-file" id="input-image" name="image" style="display: none;"
                        onchange="uploadImage(this)">
                </div>
                <span id="error-images" class="hidden text-red-800"></span>
            </div>
            <div class="w-full flex flex-col">
                <div class="flex flex-row w-full justify-between">
                    <h4 class="text-xl font-semibold text-gray-800">Name: </h4>
                    <input type="text" onchange="handleInputChange(event)"
                        class="form-control border-none focus:outline-none bg-slate-400 p-2 rounded w-1/2 text-gray-800 placeholder:text-slate-600"
                        name="name" placeholder="Product Name">
                </div>
                <span id="error-name" class="hidden text-red-800 text-right"></span>
            </div>
            <div class="w-full flex flex-col">
                <div class="flex flex-row w-full justify-between">
                    <h4 class="text-xl font-semibold text-gray-800">SKU: </h4>
                    <input type="text" onchange="handleInputChange(event)"
                        class="form-control border-none focus:outline-none bg-slate-400 p-2 rounded w-1/2 text-gray-800 placeholder:text-slate-600"
                        name="sku" placeholder="Product SKU">
                </div>
                <span id="error-sku" class="hidden text-red-800 text-right"></span>
            </div>
            <div class="w-full flex flex-col">
                <div class="flex flex-row w-full justify-between">
                    <h4 class="text-xl font-semibold text-gray-800">Category: </h4>
                    <select onchange="handleInputChange(event)"
                        class="form-control border-none focus:outline-none bg-slate-400 p-2 rounded w-1/2 text-gray-800 placeholder:text-slate-600"
                        name="category_id">
                        <option disabled selected>choose category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <span id="error-category_id" class="hidden text-red-800 text-right"></span>
            </div>
            <div class="w-full flex flex-col">
                <div class="flex flex-row w-full justify-between">
                    <h4 class="text-xl font-semibold text-gray-800">Description: </h4>
                    <textarea onchange="handleInputChange(event)"
                        class="form-control border-none focus:outline-none bg-slate-400 p-2 rounded w-1/2 text-gray-800 placeholder:text-slate-600"
                        name="description" placeholder="Product Description" rows="6"></textarea>
                </div>
                <span id="error-description" class="hidden text-red-800 text-right"></span>
            </div>
            <button class="btn btn-primary bg-slate-800 p-3 text-slate-200 rounded-lg" onclick="submitProduct(this)">Create
                Product</button>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        async function showAlert(type, message) {
            try {
                const API_URL = '{{ route('components.alert') }}';
                const response = await axios.get(API_URL, {
                    params: {
                        type,
                        message
                    },
                });

                const alertElement = new DOMParser().parseFromString(response.data, 'text/html').body.firstChild;
                document.body.insertBefore(alertElement, document.body.firstChild);
                setTimeout(() => {
                    if (document.getElementById('alert-sticky')) {
                        dismisAlert(document.getElementById('alert-sticky'));
                    }
                }, 10000);
            } catch (error) {
                console.error('Error getting alert:', error);
            }
        }

        const newProduct = {
            images: [],
            name: '',
            sku: '',
            category_id: '',
            description: '',
        }

        function handleInputChange(event) {
            const {
                name,
                value
            } = event.target;
            newProduct[name] = value;

            removeErrorMessage(name);
        }

        async function submitProduct(button) {
            if (document.getElementById('alert-sticky')) {
                dismisAlert(document.getElementById('alert-sticky'));
            }
            button.disabled = true;

            const API_URL = `{{ route('api.products.store') }}`;
            const TOKEN = '{{ $createProductToken }}';

            try {
                const headers = {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${TOKEN}`,
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }

                const response = await axios.post(API_URL, newProduct, {
                    headers: headers,
                });

                window.location.href = response.data.redirect;
            } catch (error) {
                console.error('Error creating product:', error);
                const {
                    errors,
                    message
                } = error.response.data;

                showAlert('error', message);

                for (const key in errors) {
                    showErrorMessage(key, errors[key][0]);
                }
            }

            button.disabled = false;
        }

        function showErrorMessage(name, message) {
            const errorElement = document.getElementById(`error-${name}`);
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }

        function removeErrorMessage(name) {
            const errorElement = document.getElementById(`error-${name}`);
            errorElement.classList.add('hidden');
        }

        function triggerFileInput() {
            document.getElementById('input-image').click();
        }

        async function uploadImage(input) {
            const API_URL = `{{ route('api.upload.image') }}`;
            const TOKEN = '{{ $uploadImageToken }}';

            const image = input.files[0];

            try {
                const headers = {
                    'Accept': 'application/json',
                    'Content-Type': 'multipart/form-data',
                    'Authorization': `Bearer ${TOKEN}`,
                }

                const response = await axios.post(API_URL, {
                    image
                }, {
                    headers: headers,
                });

                input.value = '';

                /**
                 * response:
                 * {
                 *    message: 'Image uploaded successfully',
                 *    data: {
                 *      url: '/storage/images/1724165903.jpg'
                 *    }
                 * }
                 */

                addImagePreview(response.data.data.url);
                newProduct.images.push(response.data.data.url);

                removeErrorMessage('images');
            } catch (error) {
                console.error('Error uploading image:', error);
            }
        }

        function getPreviewImageElement(src) {
            return `
              <div class="overflow-visible relative">
                  <div
                      class=" w-40 h-40 rounded overflow-hidden shadow-lg bg-slate-400 text-center items-center content-center">
                      <img src="${src}" alt="Product Image"
                          class="w-full h-full object-cover">
                  </div>
                  <button onclick="deleteImage(this)"
                      class="absolute -top-2 -right-2 w-8 h-8 bg-red-500 text-white p-1 rounded-full hover:bg-red-700">
                      <i class="fa-solid fa-trash fa-xs"></i>
                  </button>
              </div>
              `;
        }

        function addImagePreview(src) {
            const imageContainer = document.getElementById('image-container');
            imageContainer.insertAdjacentHTML('afterbegin', getPreviewImageElement(src));
        }

        function deleteImage(button) {
            const imageContainer = document.getElementById('image-container');
            const imageCard = button.parentElement;

            // Remove image from newProduct.images
            const imageSrc = imageCard.querySelector('img').src;
            const index = newProduct.images.indexOf(imageSrc);
            newProduct.images.splice(index, 1);

            imageContainer.removeChild(imageCard);
        }
    </script>
@endsection
