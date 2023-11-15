<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>লাইভ ম্যাপ</span> এবং যোগাযোগ</h2>
            {{-- <p>আমাদের স্কুল ও কলেজের সদ্য অনুষ্টিত সকল ইভেন্ট এর ছবি এইখানে হালনাগাদ রাখা হয়</p> --}}
        </div>
    </div>

    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-4 p-md-5 order-md-last border rounded">
                <form action="{{ route('contact_store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject" value="{{ old('subject') }}">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" class="form-control @error('message') is-invalid @enderror" placeholder="Message" name="message">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>                
                
            </div>
            {{-- <div class="col-md-6 d-flex align-items-stretch">
                <div id="map"></div>
            </div> --}}
            <div class="col-md-6 align-items-stretch border rounded">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d232.37128572888864!2d92.11067386479495!3d21.27381986172483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc2d361538949%3A0xa5f82b4cbff9e322!2sPalong%20Model%20High%20School%20and%20College!5e0!3m2!1sen!2sbd!4v1699983579951!5m2!1sen!2sbd" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
        </div>
    </div>
</section>