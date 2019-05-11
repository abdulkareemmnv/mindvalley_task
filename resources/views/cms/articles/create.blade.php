@extends('layouts.cms')

@section('title','Create Article')

@section('content')

    <nav class="p-4 rounded  mx-24 mt-6 bg-grey-lighter">
        <ol class="list-reset flex text-teal-dark">
            <li><a href="{{url('dashboard')}}" class="text-blue font-bold">Dashboard (Articles)</a></li>
            <li><span class="mx-2">/</span></li>
            <li>Create</li>
        </ol>
    </nav>

    <div class="flex mx-12 mt-6">
        <div class="w-full mx-12">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                <form id="articleForm" method="POST" action="{{ url('article') }}" class="p-5" >
                    @csrf
                    <div class="mb-6">
                        <label for="title" class="block text-grey-darker text-lg font-bold mb-2">{{ __('Article Title') }} @include('parts.req_star')</label>
                        <input id="title" type="text" name="title" class="appearance-none border rounded w-full py-2 px-3 text-grey-darker{{ $errors->has('title') ? ' is-invalid' : '' }}"  placeholder="{{ __('Article Title') }}"  value="{{ old('title') }}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-4 ckeditor-cont">
                        <label for="content" class="block text-grey-darker text-lg font-bold mb-2">{{ __('Article Content') }} @include('parts.req_star')</label>
                        <textarea id="content" name="content" rows="8" class="ckeditor appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('content') ? ' is-invalid' : '' }} " required>{{ old('content') }}</textarea>

                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mb-5 mt-3">
                        <label for="tags" class="block text-grey-darker text-lg font-bold mb-2">{{ __('Article Tags') }}</label>
                        <div id="tags" name="tags" class="input textarea clearfix"></div>
                    </div>

                    <div class="mb-6 filepond-cont">
                        <label for="photos" class="block text-grey-darker text-lg font-bold mb-2">{{ __('Article Photos') }}</label>
                        <input type="file" id="photos" class="filepond filepondReq" name="photos[]" multiple required>

                        @if ($errors->has('photos'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('photos') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="flex items-center justify-between mt-24">
                        <button type="submit" id="saveArticleBtn" class="bg-blue hover:bg-blue-dark text-white font-bold py-3 px-32 mx-auto my-0 rounded">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        var $articleFormValidator;
        $(function(){
            //-------------------------------------------------------------------//
            CKEDITOR.replace('content');
            //-------------------------------------------------------------------//
            FilePond.registerPlugin(
                FilePondPluginImagePreview,
            );

            FilePond.setOptions({
                server: {
                    url: '{{url('article/uploadPhotos')}}',
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }
                }
            });

            var pond = FilePond.create(
                $('#photos')[0]
            );
            @if(old('photos'))
                @foreach(old('photos') as $photo)
                    pond.addFiles('{!! url('storage/images/'.$photo) !!}');
                @endforeach
            @endif
            //-------------------------------------------------------------------//
            var tags = new Taggle('tags', {
                duplicateTagClass: 'bounce'
            });
            var container = tags.getContainer();
            var input = tags.getInput();

            $(input).autocomplete({
                source: {!! $allTags !!},
                appendTo: container,
                position: { at: "left bottom", of: container },
                select: function(event, data) {
                    event.preventDefault();
                    //Add the tag if user clicks
                    if (event.which === 1) {
                        tags.add(data.item.value);
                    }
                }
            });
            //-------------------------------------------------------------------//
             $articleFormValidator = $('form#articleForm').validate({
                errorPlacement: function(error, element) {
                    var elem = $(element);
                    if (elem.hasClass("ckeditor")) {
                        error.insertAfter(elem.parents('.ckeditor-cont')[0]);
                    }else if (elem.hasClass("filepond--browser")) {
                        error.insertAfter(elem.parents('.filepond-cont')[0]);
                    }else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
            //-------------------------------------------------------------------//
            $('#saveArticleBtn').click(function(){
                console.log('saveArticleBtn');
                var contentLength = CKEDITOR.instances['content'].getData().replace(/<[^>]*>/gi, '').length;
                console.log(contentLength);
                // if(contentLength)
                var sss = $('form#articleForm').validate().showErrors({content: "This field is required."});
                console.log(sss);
            });
            //-------------------------------------------------------------------//
        });
    </script>
@stop