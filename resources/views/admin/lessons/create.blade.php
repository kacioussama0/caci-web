@extends('admin.layouts.app')


@section('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('tinymce/jquery.tinymce.min.js') }}"></script>
    <script>

            tinymce.init({
                selector: 'textarea.tinymce',
                @if(config('app.locale') == 'ar')
                language: 'ar',
                directionality: 'rtl',
                @endif
                height: 200,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | print preview',
                file_picker_callback (callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                    let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight
                    tinymce.activeEditor.windowManager.openUrl({
                        url : '/file-manager/tinymce5',
                        title : 'Laravel File manager',
                        width : x * 0.8,
                        height : y * 0.8,
                        onMessage: (api, message) => {
                            callback(message.content, { text: message.text })
                        }
                    })
                }
            });

    </script>
@endsection

@section('content')

    <div class="container">

        <form action="{{route('lessons.store')}}" method="POST" class="mb-5" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea name="content" id="content" class="form-control tinymce">{!! old('content') !!}</textarea>
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Module</label>

                <select name="module" id="module" class="form-select">
                    <option value="" selected disabled>Selectioner Module</option>
                    @foreach($modules as $module)
                        <option value="{{$module->id}}">{{$module->title}}</option>
                    @endforeach
                </select>

                @error('module')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <button class="btn btn-primary w-100">Ajouter Leçon</button>

        </form>




    </div>

@endsection
