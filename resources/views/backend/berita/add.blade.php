@extends('layouts.backend_main')
@section('title', 'Tambah Berita')
@section('content')

    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            height: 250px;
            overflow-y: scroll;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/dropify.css">
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">@yield('title')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('berita.index') }}" class="btn btn-secondary btn-blog mb-3"><i
                                class="fa-solid fa-rotate-left"></i>
                            Kembali</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                            <div class="invalid-feedback errorTitle"></div>

                                            <input type="text" id="slug" name="slug" class="form-control mt-2"
                                                placeholder="Permalink" style="background-color: #F8F8F8; color:blue;">
                                        </div>
                                        <div class="form-group">
                                            <label>Konten</label>
                                            <textarea id="content" name="content"></textarea>
                                            <small class="text-danger errorContent"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="image" id="image" class="dropify">
                                            <small class="text-danger errorImage"></small>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="">-- Pilih Kategori --</option>
                                                @foreach ($kategori as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback errorKategori"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tag</label>
                                            <div style="overflow-y:scroll;height:150px;margin-bottom:30px;">
                                                @foreach ($tag as $row)
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="checkbox" name="tag[]"
                                                                value="{{ $row->name }}">
                                                            {{ $row->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <small class="text-danger errorTag"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
    <script src="{{ asset('assets') }}/js/dropify.min.js"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('berita.store') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#simpan').attr('disable', 'disabled');
                        $('#simpan').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#simpan').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.title) {
                                $('#title').addClass('is-invalid');
                                $('.errorTitle').html(response.errors.title);
                            } else {
                                $('#title').removeClass('is-invalid');
                                $('.errorTitle').html('');
                            }
                            if (response.errors.content) {
                                $('#content').addClass('is-invalid');
                                $('.errorContent').html(response.errors.content);
                            } else {
                                $('#content').removeClass('is-invalid');
                                $('.errorContent').html('');
                            }

                            if (response.errors.image) {
                                $('#image').addClass('is-invalid');
                                $('.errorImage').html(response.errors.image);
                            } else {
                                $('#image').removeClass('is-invalid');
                                $('.errorImage').html('');
                            }

                            if (response.errors.kategori) {
                                $('#kategori').addClass('is-invalid');
                                $('.errorKategori').html(response.errors.kategori);
                            } else {
                                $('#kategori').removeClass('is-invalid');
                                $('.errorKategori').html('');
                            }

                            if (response.errors.tag) {
                                $('.errorTag').html(response.errors.tag);
                            } else {
                                $('.errorTag').html('');
                            }

                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil disimpan',
                            }).then(function() {
                                top.location.href = "{{ route('berita.index') }}";
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
        $('#title').keyup(function() {
            let title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g, '-');
            $('#slug').val(title);
        });

        $('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove: 'Hapus',
                error: 'error'
            }
        });

        CKEDITOR.ClassicEditor.create(document.getElementById("content"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF', 'exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|', 'bold', 'italic', 'strikethrough', 'underline', 'removeFormat', '|',
                        'numberedList', 'todoList', '|', 'outdent', 'indent', '|',
                        'undo', 'redo', '-', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
                        '|', 'alignment', '|', 'link', 'blockQuote', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Silakan isi konten anda disini!',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [{
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                            '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                            '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                            '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load     this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            })
            .catch(error => {
                console.log(error);
            });
    </script>
@endsection
