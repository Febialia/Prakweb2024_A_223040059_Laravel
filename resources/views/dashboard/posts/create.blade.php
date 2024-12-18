<x-layout-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <div class="inline-flex items-baseline">
                <a href="/dashboard/posts" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">&laquo; Back to all posts</a>
            </div>
            <form class="space-y-4 md:space-y-6" action="/dashboard/posts" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('title') text-red-700 dark:text-red-500 @enderror">Title</label>
                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror" placeholder="Enter yout title" required="" value="{{ old('title') }}">
                    @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('slug') text-red-700 dark:text-red-500 @enderror">Slug</label>
                    <input type="text" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('slug') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror" placeholder="Enter your slug" required="" value="{{ old('slug') }}">
                    @error('slug')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('category_id') text-red-700 dark:text-red-500 @enderror">Category</label>
                    <select type="text" name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('category_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror" placeholder="Enter your category id" required="" value="{{ old('category_id') }}">
                        <option value="">Select your category</option>
                        @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('image') text-red-700 dark:text-red-500 @enderror"" for="file_input">Post Image</label>
                <img src="" alt="" class="img-preview img fluid w-full max-w-96">
                <input onchange="previewImage()" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') block w-full text-sm text-red-900 border border-red-300 rounded-lg cursor-pointer bg-red-50 dark:text-red-400 focus:outline-none dark:bg-gredray-700 dark:border-red-600 dark:placeholder-red-400 @enderror" aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 1048KB).</p>
                @error('image')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
                </div>

                <div>
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('body') text-red-700 dark:text-red-500 @enderror">Body</label>
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>

                    @error('body')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create Post</button>

            </form>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function() {
          fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
        document.addEventListener('trix-file-accept', function(e) {
          e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#file_input');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREVent) {
                imgPreview.src = oFREVent.target.result;
            }
        }
      </script>
</x-layout-dashboard>