@extends('layouts.admin')

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<link href="{{asset('admin/product/tagsinput.css')}}" rel="stylesheet" />

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
<script src="{{asset('admin/product/tagsinput.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $(".tags_select2").select2({
            tags: true,
            tokenSeparators: [',']
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('.price_format').simpleMoneyFormat();

    });
</script>
<script>
    $(document).ready(function() {
        show_gallery();

        function show_gallery() {
            var id_product = $("#id_product").val();
            var _token = $('input[name="_token"]').val();
            $.ajax({

                type: "POST",
                dataType: 'JSON',
                url: "{{ route('admin.product.show_image_ajax') }}",
                data: {
                    id_product: id_product,
                    _token: _token
                },
                success: function(data) {
                    $("#show_images").html(data.output_image);

                }

            });
        };
        $(document).on('change', '.choose_file_image', function() {
            var id_product = $("#id_product").val();

            var product_images = document.getElementById('thumbnail').files[0];

            var form_data = new FormData();
            form_data.append("thumbnail", document.getElementById('thumbnail').files[0]);
            form_data.append("id_product", id_product);
            $.ajax({
                url: "{{ route('admin.product.insert_image_ajax') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    show_gallery();
                }
            });

        });


        $(document).ready(function() {
            $(document).on('click', 'a.delete_image', function() {
                var id_product = $(this).data('id_product');
                var form_data = new FormData();
                if (confirm('B???n c?? ch???c ch???n mu???n x??a h??nh ???nh n??y kh??ng?')) {

                    form_data.append("id_product", id_product);
                    $.ajax({
                        url: "{{ route('admin.product.delete_image_ajax') }}",
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            show_gallery();
                        }
                    });
                }
            });
        });

    });
</script>





@endsection
@section('content')



<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Ch???nh s???a s???n ph???m
        </div>
        <div class="card-body">
            <form action="{{route("admin.product.update",$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">

                            <input type="hidden" name="id_product" id="id_product" value="{{$product->id}}">

                            <label for=" name">T??n s???n ph???m</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{$product->name}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Gi?? nh???p</label>
                                    <input class="form-control price_format" type="text" name="price_cost" id="price_cost" value={{$product->price_cost}}>
                                    @error('price_cost')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Gi?? b??n</label>
                                    <input class="form-control price_format" type="text" name="price" id="price" value={{$product->price}}>
                                    @error('price')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">S??? l?????ng</label>
                                    <input class="form-control" type="text" name="qty" id="qty" value={{$product->qty}}>
                                    @error('qty')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">M?? t??? s???n ph???m</label>
                            <input class="form-control" type='text' id="description" name="description" value="{{$product->description}}">
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="content">Chi ti???t s???n ph???m</label>
                    <textarea class="form-control" id="content" name="content" cols="30" rows="5">{{$product->content}}</textarea>
                    @error('content')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="">Danh m???c</label>
                    <?php
                    $categories = array();
                    showCategories($product_cats, $categories);
                    ?>
                    <select class="form-control" id="product_cat_id" name="product_cat_id">
                        <option value="">Ch???n danh m???c</option>

                        @foreach($categories as $k=>$product_cat)
                        <option value="{{$k}}" {{$k==$product->product_cat_id?"selected='selected'":""}}>{{$product_cat['name']}}</option>
                        @endforeach
                    </select>
                    @error('product_cat_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Th????ng hi???u</label>

                    <select class="form-control" id="product_brand" name="product_brand">
                        <option value="">Ch???n danh m???c</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}" {{$brand->id==$product->product_brand_id?"selected='selected'":""}}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @error('product_brand')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="">Nh???p tags</label><br>
                    <select class="form-control tags_select2" multiple="multiple" name="product_tags[]">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->name}}" {{$product_tags->contains('name',$tag->name)?"selected":"" }}>{{$tag->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Ch???n h??nh ???nh</label>
                    <input type="file" class="form-control-file choose_file_image" name="thumbnail" id="thumbnail" accept="image/*">
                    <span id="error_galeery"> </span>
                    <div class="col-md-6 mt-2">
                        <div class="row" id="show_images">
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <label>H??nh ???nh chi ti???t</label>
                    <div class="col-md-12 mt-2">
                        <div class="row" id="show_images_detail">
                            @foreach($product_images as $item)
                            <div class=" image_detail" style="padding-right:0px; margin-right:10px; margin-top:10px;">
                                <img src="{{url("$item->image_path")}}" alt="" style="max-width:100%; height:130px; object-fit:cover; ">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{route('admin.product.dropzone_show',$product->id)}}" style="margin-left:15px; margin-top:15px;" class="btn btn-outline-secondary btn-sm ">Ch???nh s???a</a>



                </div>
                <br>
                <div class="form-group">
                    <label for="">S???n ph???m</label><br>

                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="featured" id="featured" {{$product->featured==1?"checked":""}}>
                        <label class="form-check-label" for="featured">N???i b???t</label><br>
                        <input class="form-check-input" type="radio" name="best_seller" id="best_seller" {{$product->best_seller==1?"checked":""}}>
                        <label class="form-check-label" for="best_seller"> B??n ch???y</label><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Tr???ng th??i</label>
                    @foreach($browses as $k=>$browse)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="browse" id="{{$k}}_browse" value="{{$k}}" {{$k==$product->browse?"checked":""}}>
                        <label class="form-check-label" for="{{$k}}_browse">
                            {{$browse}}
                        </label>
                    </div>
                    @endforeach
                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">T??nh tr???ng</label>
                    @foreach($statuses as $k=>$status)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="{{$k}}_status" value="{{$k}}" {{$k==$product->status?"checked":""}}>
                        <label class="form-check-label" for="{{$k}}_status">
                            {{$status}}
                        </label>
                    </div>
                    @endforeach
                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>



                <button type="submit" name="btn-update" class="btn btn-primary">C???p nh???t</button>
            </form>
        </div>
    </div>
</div>
@endsection