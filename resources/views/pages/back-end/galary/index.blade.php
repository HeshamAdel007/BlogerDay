@extends('layouts.adminPanel')

@section('title', 'Galary')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary" style="margin-top: 1rem;">
              <div class="card-header">
                <h4 class="card-title">Images Galary</h4>
              </div>
              <div class="card-body">
                <div class="row">
                    @foreach($images as $img)
                        <div class="col-sm-2 col-md-4">
                            <div class="img-body">
                                <a
                                    href="{{$img->photo_path}}"
                                    data-toggle="lightbox"
                                    data-max-width="780"
                                    data-max-height="780"
                                    data-type="image"
                                    data-gallery="gallery"
                                    data-footer="{{ $img->description }}"
                                    data-title="{{ $img->title . ' | Share On [ ' . $img->post_count . ' ] posts' }}">
                                    <img
                                        src="{{$img->photo_path}}"
                                        class="img-fluid mb-2"
                                        alt="{{ $img->title }}">
                                    <div class="img-btn">
                                        @if (Auth::user()->hasPermission('update_gallery'))
                                            <a href="{{Route('image.edit', ['id'=>$img->id])}}" class="edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @else
                                            <button class="btn btn-success" disabled>
                                                <i class="fa fa-edit"></i> edit
                                            </button>
                                        @endif
                                        @if (Auth::user()->hasPermission('delete_gallery'))
                                            <a href="{{Route('image.delete', ['id'=>$img->id])}}" class="delete btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @else
                                            <button class="btn btn-danger" disabled>
                                                <i class="fas fa-trash"></i> delete
                                            </button>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('back-end/dist/plugins/ekko-lightbox/ekko-lightbox.css') }}">
<style type="text/css">
.card-body .img-body {
    position: relative;
    overflow: hidden;
}
.card-body .img-body .img-btn{
    position: absolute;
    width: 100%;
    bottom: 11px;
    padding: 5px;
}
.card-body .img-body .img-btn a{
    background-color: #000;
    border-radius: 4px;
    width: 2rem;
    height: 2rem;
    line-height: 1;
    color: #fff;
}
.card-body .img-body .img-btn .edit {
    float: left;
}
.card-body .img-body .img-btn .delete {
    float: right;
}
.card-body .img-body .img-btn a i{
    position: relative;
    left: 9px;
    color: #fff;
    line-height: 2;
}
</style>
@endpush

@push('scripts')
<script src="{{ asset('back-end/dist/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

<script type="text/javascript">
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true,
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endpush

