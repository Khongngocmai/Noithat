@extends('admin.layouts.index')


@section('content')
<h1 class="h3 mb-2 text-gray-800">Phản hồi</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('contact.reply', ['id' => $contact->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <input type="hidden" name="email" value="{{ $contact->email }}" />
            <div class="form-group">
                <label for="description">Nội dung phản hồi:</label>
                <textarea class="form-control" id="description" name="reply"></textarea>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Phản hồi</button>
          </form>
    </div>
</div>
@endsection