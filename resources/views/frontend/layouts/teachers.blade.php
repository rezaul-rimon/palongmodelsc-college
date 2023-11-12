<style>
    .teacher-card {
        border: 1px solid #e0e0e0;
        padding: 15px;
        transition: box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative; /* Add this line to make the button position relative to the teacher card */
    }

    .teacher-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .teacher-photo {
        position: relative;
        overflow: hidden;
        flex: 1;
    }

    .teacher-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        background: rgba(0, 0, 0, 0.7);
        opacity: 0;
        transition: opacity 0.3s ease;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .teacher-photo:hover .social-icons {
        opacity: 1;
    }

    .social-icons a {
        color: #fff;
        margin: 0 5px;
        text-decoration: none;
    }

    .teacher-info {
        text-align: center;
        overflow: hidden;
        height: 120px;
        margin-top: 10px;
    }

    .details-button {
        position: absolute; /* Set absolute position */
        bottom: 5px; /* Adjust as needed */
        left: 50%;
        transform: translateX(-50%);
    }

	.details-button {
        background-color: #17a2b8; /* Set the default background color */
        color: #fff; /* Set the default text color */
        border: 1px solid #17a2b8; /* Set the default border color */
        transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease;
    }

    .details-button:hover {
        background-color: #fff; /* Set the background color on hover */
        color: #17a2b8; /* Set the text color on hover */
        border: 1px solid #17a2b8; /* Set the border color on hover */
    }
</style>

<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>সম্মানিত</span> শিক্ষক মহোদয়গন</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the
					necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>

        <div class="row">
            @foreach ($teachers as $teacher)
                <div class="col-md-3 mb-4">
                    <div class="teacher-card rounded">
                        <div class="teacher-photo">
                            <img src="{{ asset('Resources/Teachers/Photos/' . $teacher->teacher_photo) }}" alt="{{ $teacher->teacher_name }}">
                            <div class="social-icons">
                                <!-- Add social icons and links here (displayed on hover) -->
                                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                <!-- Add more social icons as needed -->
                            </div>
                        </div>
                        <div class="teacher-info">
                            <h5 style="margin-bottom: -5px;">{{ $teacher->teacher_name }}</h5>
                            <p style="margin-bottom: -20px;">{{ $teacher->teacher_designation }}</p><br>
                            <p style="font-size: 13px; line-height: 1.2;">{{ $teacher->teacher_description }}</p>
                        </div>
                        <button class="details-button btn btn-sm">বিস্তারিত</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>