@extends('layouts.admin')

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

<style>
    .image_detail {
        position: relative;
    }

    .icon_delete {
        position: absolute;

    }
</style>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".tags_select2").select2({
            tags: true,
            tokenSeparators: [',']
        })
    });
</script>


<script type="text/javascript">
    Dropzone.options.dropzoneForm = {

        autoProcessQueue: false,
        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",

        init: function() {
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;

            submitButton.addEventListener('click', function() {
                myDropzone.processQueue();
            });

            this.on("complete", function() {
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                    var _this = this;
                    _this.removeAllFiles();
                }
                load_images();
            });

        }

    };

    load_images();

    function load_images() {
        var id_product = $('#id_product').val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "{{ route('admin.product.dropzone_fetch') }}",
            data: {
                id_product: id_product,
                _token: _token
            },
            success: function(data) {
                $('#uploaded_image').html(data);
            }
        })
    }

    $(document).on('click', '.remove_image', function() {
        var id_product = $('#id_product').val();
        var _token = $('input[name="_token"]').val();

        var name = $(this).attr('id');
        $.ajax({
            url: "{{ route('admin.product.dropzone_delete') }}",
            data: {
                name: name,
                id_product: id_product,
                _token: _token

            },
            success: function(data) {
                load_images();
                if (data == "directory_empty") {
                    location.reload();
                }
            }
        })
    });
</script>




@endsection
@section('content')


<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Ch???nh s???a h??nh ???nh chi ti???t c???a s???n ph???m
        </div>
        <div class="card-body">

            <div class="form-group">
                <div class="panel-body">
                    <form id="dropzoneForm" class="dropzone" action="{{ route('admin.product.dropzone_upload',$product->id) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" id="id_product" name="id_product" value="{{$product->id}}">
                    </form>
                    <div align="center">
                        <button type="button" class="mt-2 btn btn-outline-secondary btn-sm" id="submit-all">Upload</button>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">H??nh ???nh chi ti???t hi???n c?? c???a s???n ph???m</h3>
                    </div>
                    <div class="panel-body" id="uploaded_image">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection