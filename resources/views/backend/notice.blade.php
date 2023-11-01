@extends('backend.layouts.back_app')

@section('content')


<style>
    .page-title {
        text-align: left;
        margin: 20px 0 10px 0;
    }

    .add-button {
        text-align: right;
        margin: 20px 0 10px 0;
    }

    @media (max-width: 768px) {
        .page-title {
            text-align: center;
            margin: 20px 0 10px 0;
        }

        .add-button {
            text-align: center;
            margin: 0 0 10px 0;
        }
    }

</style>


<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6 col-12 page-title">
                <h1 class="text-danger">নোটিশ ম্যানেজমেন্ট</h1>
            </div>

            <div class="col-md-6 col-12 add-button">
                {{-- <a style="margin-bottom: 20px;" class="btn btn-primary" href="">নতুন নোটিশ যুক্ত করুন</a> --}}
                <button style="margin-bottom: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noticeAddModal">
                    নতুন নোটিশ যুক্ত করুন
                </button>
            </div>
        </div>

        <table class="table table-responsive table-bordered text-center">
            <colgroup>
                <col style="width: 5%;">
                <col style="width: 10%;">
                <col style="width: 15%;">
                <col style="width: 35%;">
                <col style="width: 15%;">
                <col style="width: 12%;">
                <col style="width: 8%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ক্রম</th>
                    <th>তারিখ</th>
                    <th>নোটিশ টাইপ</th>
                    <th>নোটিশ সারমর্ম</th>
                    <th>নোটিশ ফাইল</th>
                    <th>নোটিশ যুক্তকারী</th>
                    <th>একশন</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $sl=1;
                @endphp
                @foreach($notice as $item)
                    <tr>
                        <td class="align-middle">{{ $sl++ }}</td>
                        <td class="align-middle">{{ $item->created_at }}</td>
                        <td class="align-middle">{{ $item->notice_type }}</td>
                        <td class="align-middle">{{ $item->notice_summary }}</td>
                        <td class="align-middle">
                            <a target="_blank" href="{{ asset('Resources' . DIRECTORY_SEPARATOR . 'Notice' . DIRECTORY_SEPARATOR . 'Files' . DIRECTORY_SEPARATOR . $item->notice_file) }}">{{ $item->notice_file }}</a>
                        </td>
                        <td class="align-middle">{{ $item->user->name }}</td>
                        <td class="align-middle">
                            <a href="#" class="btn my-1 btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn my-1 btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

{{-- <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-danger">Notice</h1>
        <form action="">
            <div class="form-group mb-3">
                <label for="notice_type">নোটিশ টাইপঃ</label>
                <input type="text" class="form-control" id="notice_type" name="notice_type">
            </div>
            <div class="form-group mb-5">
                <label for="notice_type">নোটিশ সারমর্মঃ</label>
                <input type="text-area" class="form-control" id="notice_type" name="notice_type">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" value="Add a Notice">
            </div>
        </form>
        
    </div>
</main> --}}
@endsection

<!-- Modal -->
<div class="modal fade" id="noticeAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.add_notice') }}" method="POST" id="notice" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group mb-4">
                        <label for="noticeType">নোটিশ টাইপ</label>
                        <input type="text" class="form-control @error('noticeType') is-invalid @enderror" id="noticeType" name="noticeType" value="{{ old('noticeType') }}">
                        @error('noticeType')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-group mb-4">
                        <label for="noticeSummary">নোটিশ সারমর্ম</label>
                        <textarea class="form-control @error('noticeSummary') is-invalid @enderror" id="noticeSummary" name="noticeSummary">{{ old('noticeSummary') }}</textarea>
                        @error('noticeSummary')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="noticeFile">নোটিশ ফাইল</label>
                        <input type="file" class="form-control @error('noticeFile') is-invalid @enderror" id="noticeFile" name="noticeFile" value="{{ old('noticeFile') }}">
                        @error('noticeFile')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Add a Notice" class="btn btn-success">
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>

