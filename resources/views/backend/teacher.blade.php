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
                <h1 class="text-danger">শিক্ষক ম্যানেজমেন্ট</h1>
            </div>

            <div class="col-md-6 col-12 add-button">
                {{-- <a style="margin-bottom: 20px;" class="btn btn-primary" href="">নতুন নোটিশ যুক্ত করুন</a> --}}
                <button style="margin-bottom: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teacherAddModal">
                    নতুন শিক্ষক যুক্ত করুন
                </button>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <script>
            $(document).ready(function() {
                $('.alert').delay(2000).fadeOut(500);
            });
        </script>               

        <table class="table table-responsive table-bordered text-center">
            <colgroup>
                <col style="width: 5%;">
                <col style="width: 10%;">
                <col style="width: 5%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 12%;">
                <col style="width: 8%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ক্রম</th>
                    <th>তারিখ</th>
                    <th>ছবি</th>
                    <th>শিক্ষকের নাম</th>
                    <th>শিক্ষকের পদবী</th>
                    <th>সংখিপ্ত বিবরণ</th>
                    <th>গৃহীত বিষয়</th>
                    <th>শিক্ষক যুক্তকারী</th>
                    <th>একশন</th>
                </tr>
            </thead>

            <tbody>
                @forelse($teacher as $item)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->created_at }}</td>
                        <td class="align-middle">
                            <img src="{{ asset('Resources/Teachers/Photos/' . $item->teacher_photo) }}" alt="{{ $item->teacher_name }} Photo" style="max-width: 60px; height: 60px;">
                        </td>
                        <td class="align-middle">{{ $item->teacher_name }}</td>
                        <td class="align-middle">{{ $item->teacher_designation }}</td>
                        <td class="align-middle">{{ $item->teacher_description }}</td>
                        <td class="align-middle">{{ $item->taken_subject }}</td>
                        <td class="align-middle">{{ $item->user->name }}</td>
                        <td class="align-middle">
                            <a href="#" class="btn my-1 btn-sm btn-warning">Edit</a>
                            <a href="{{ route('backend.delete_teacher', $item->id) }}" class="btn my-1 btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="8">এই পর্যন্ত কোন শিক্ষক সংযোজন করা হয়নি।</td>
                    </tr>
                @endforelse
            </tbody>            
        </table>
    </div>
</main>
@endsection

<!-- Modal -->
<div class="modal fade" id="teacherAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.add_teacher') }}" method="POST" id="notice" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group mb-4">
                        <label for="teacherName">শিক্ষকের নাম</label>
                        <input type="text" class="form-control @error('teacherName') is-invalid @enderror" id="teacherName" name="teacherName" value="{{ old('teacherName') }}">
                        @error('teacherName')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-group mb-4">
                        <label for="teacherDesignation">শিক্ষকের পদবী</label>
                        <input type="text" class="form-control @error('teacherDesignation') is-invalid @enderror" id="teacherDesignation" name="teacherDesignation" value="{{ old('teacherDesignation') }}">
                        @error('teacherDesignation')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="teacherDescription">সংখিপ্ত বিবরণ</label>
                        <textarea class="form-control @error('teacherDescription') is-invalid @enderror" id="teacherDescription" name="teacherDescription">{{ old('teacherDescription') }}</textarea>
                        @error('teacherDescription')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="takenSubject">গৃহীত বিষয় সমূহ</label>
                        <textarea class="form-control @error('takenSubject') is-invalid @enderror" id="takenSubject" name="takenSubject">{{ old('takenSubject') }}</textarea>
                        @error('takenSubject')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="teacherPhoto">শিক্ষকের ছবি</label>
                        <input type="file" class="form-control @error('teacherPhoto') is-invalid @enderror" id="teacherPhoto" name="teacherPhoto" value="{{ old('teacherPhoto') }}">
                        @error('teacherPhoto')
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

