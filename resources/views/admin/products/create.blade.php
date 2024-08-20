@extends('admin.layouts.main')

@section('content')
    <section class="content-start max-w-3xl w-full">
        <div id="image-container" class=" flex flex-row flex-wrap gap-8 content-start justify-start w-full">
            <div onclick="triggerFileInput()"
                class="w-40 h-40 rounded overflow-hidden shadow-lg bg-slate-400 text-center items-center content-center hover:cursor-pointer">
                <i class="fa-solid fa-plus fa-2xl"></i>
            </div>

            <input type="file" class="form-control-file" id="input-image" name="image" style="display: none;"
                onchange="uploadImage(this)">
        </div>
    </section>
@endsection

@section('scripts')
    <script>
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
                console.log(response.data);
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
            imageContainer.removeChild(imageCard);
        }
    </script>
@endsection
