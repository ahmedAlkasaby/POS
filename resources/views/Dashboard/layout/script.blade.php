<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script src={{ asset("js/jquery.js")}}></script>
<!-- Bootstrap 4 -->
<script src={{ asset("js/bootstrap.bundle.js")}}></script>
<!-- AdminLTE App -->
<script src={{ asset("js/adminlte.js")}}></script>


<script src={{ asset("plugins/jquery/jquery.min.js")}}></script>

<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>

<script src={{ asset("dist/js/adminlte.min.js?v=3.2.0")}}></script>

<script src={{ asset("dist/js/demo.js")}}></script>
{{-- <script src="{{ vite('resources/js/app.js') }}"></script> --}}


<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
        }
    }
</script>

<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

        ClassicEditor
        .create( document.querySelector( '#editorar' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        } )
        .then( /* ... */ )
        .catch( /* ... */ );

        ClassicEditor
        .create( document.querySelector( '#editoren' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            }
        } )
        .then( /* ... */ )
        .catch( /* ... */ );



        // ClassicEditor
        // .create( document.querySelector( '#editor' ), {
        //     plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
        //     toolbar: {
        //         items: [
        //             'undo', 'redo', '|', 'bold', 'italic', '|',
        //             'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
        //         ]
        //     }
        // } )
        // .then( /* ... */ )
        // .catch( /* ... */ );
</script>

@yield('js')
