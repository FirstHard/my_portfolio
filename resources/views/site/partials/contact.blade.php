<div class="container mt-5" id="contact">
    <div class="row justify-content-evenly">
        <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-green">
            <h3 class="text-center mb-0">Contact:</h3>
        </div>
        <div class="col-12 col-xl-10">
            <div class="contact bg-white">
                <div class="row pt-3">
                    <div class="col-12 form mb-3">
                        <form action="{{ route('contact') }}" method="POST" id="contactForm">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control rounded-0" id="name" name="name"
                                    placeholder="Your First and Last Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control rounded-0" id="email" name="email"
                                    placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <div class="input-group">
                                    <select class="form-select rounded-0" id="subject" name="subject">
                                        <option value="" selected disabled>Select a subject</option>
                                        <option value="custom">Custom</option>
                                        <option value="General inquiry">General inquiry</option>
                                        <option value="I offer part-time employment">I offer part-time employment
                                        </option>
                                        <option value="Offering full-time employment">Offering full-time employment
                                        </option>
                                    </select>
                                    <input type="text" class="form-control d-none rounded-0" id="customSubject"
                                        name="custom_subject" placeholder="Your subject...">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control rounded-0" id="message" name="message" rows="4" placeholder="Your Message"
                                    required></textarea>
                            </div>
                            {!!  GoogleReCaptchaV3::renderField('contactFormVerify','contact') !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <div class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                        </form>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible rounded-0 mb-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible rounded-0 mb-3" role="alert">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <hr>
                    <div class="col-12 text-center mt-3">
                        <h3 class="mb-3">You can also visit my profiles and contact me via private messages:</h3>
                        <div class="profiles row fs-4">
                            <div class="col-12 col-lg-4">
                                <a href="https://github.com/FirstHard" target="_blank" rel="nofollow noopener"
                                    class="list-group-item mb-3"><i class="bi bi-github"></i> Github</a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="https://www.linkedin.com/in/volodymyr-buynov/" target="_blank"
                                    rel="nofollow noopener" class="list-group-item mb-3"><i class="bi bi-linkedin"></i>
                                    Linkedin</a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="https://t.me/buinoff" target="_blank" rel="nofollow noopener"
                                    class="list-group-item mb-3"><i class="bi bi-telegram"></i> Telegram</a>
                            </div>
                            <div class="col-12 offset-lg-5 col-lg-2">
                                <a href="https://www.upwork.com/freelancers/~0150d1a731b26b452f" target="_blank"
                                    rel="nofollow noopener" class="list-group-item mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 102 28" role="img"
                                        aria-hidden="true">
                                        <path fill="#14a800"
                                            d="M28.18,19.06A6.54,6.54,0,0,1,23,16c.67-5.34,2.62-7,5.2-7s4.54,2,4.54,5-2,5-4.54,5m0-13.34a7.77,7.77,0,0,0-7.9,6.08,26,26,0,0,1-1.93-5.62H12v7.9c0,2.87-1.3,5-3.85,5s-4-2.12-4-5l0-7.9H.49v7.9A8.61,8.61,0,0,0,2.6,20a7.27,7.27,0,0,0,5.54,2.35c4.41,0,7.5-3.39,7.5-8.24V8.77a25.87,25.87,0,0,0,3.66,8.05L17.34,28h3.72l1.29-7.92a11,11,0,0,0,1.36,1,8.32,8.32,0,0,0,4.14,1.28h.34A8.1,8.1,0,0,0,36.37,14a8.12,8.12,0,0,0-8.19-8.31">
                                        </path>
                                        <path fill="#14a800"
                                            d="M80.8,7.86V6.18H77.2V21.81h3.65V15.69c0-3.77.34-6.48,5.4-6.13V6c-2.36-.18-4.2.31-5.45,1.87">
                                        </path>
                                        <polygon fill="#14a800"
                                            points="55.51 6.17 52.87 17.11 50.05 6.17 45.41 6.17 42.59 17.11 39.95 6.17 36.26 6.17 40.31 21.82 44.69 21.82 47.73 10.71 50.74 21.82 55.12 21.82 59.4 6.17 55.51 6.17">
                                        </polygon>
                                        <path fill="#14a800"
                                            d="M67.42,19.07c-2.59,0-4.53-2.05-4.53-5s2-5,4.53-5S72,11,72,14s-2,5-4.54,5m0-13.35A8.1,8.1,0,0,0,59.25,14,8.18,8.18,0,1,0,75.6,14a8.11,8.11,0,0,0-8.18-8.31">
                                        </path>
                                        <path fill="#14a800"
                                            d="M91.47,14.13h.84l5.09,7.69h4.11l-5.85-8.53a7.66,7.66,0,0,0,4.74-7.11H96.77c0,3.37-2.66,4.65-5.3,4.65V0H87.82V21.82h3.64Z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
