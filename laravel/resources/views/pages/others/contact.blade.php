@extends('layouts.main')

@section('title')
    Contact Us
@endsection

@section('content')


    <!-- ===== Page title section start ===== -->
    <section class="page-top-bg mb-5">
        <div class="page-overlay">
            <div class="container">
            <div class="row">
                <div class="col">
                <h3 class="font_six text-white">Contact Us</h3>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ===== Page title section end ===== -->

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center py-5">
                    <h2 class="section-title">Get in <span>Touch</span> </h2>
                    <p class="section-subtitle">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Nam fugiat iste inventore totam assumenda vel, numquam perferendis provident perspiciatis laborum aliquam fuga tempore itaque, illo minima, minus omnis unde eius!
                    </p>
                </div>
            </div>
        </div>    
      </section>
    
    <section>
        <div class="contact-bg bg-light py-5">
          <form action="">
            <div class="container">
              <div class="row">
                <div class="col-12 col-sm-7">
                  <div class="row">
                    <div class="col-12 col-sm-6">
                      <div class="mb-3">
                        <label for="" class="form-label">First Name</label>
                        <input type="email" class="form-control" id="" placeholder="First Name">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="" placeholder="name@example.com">
                      </div>
                      
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="mb-3">
                        <label for="" class="form-label">Last Name</label>
                        <input type="email" class="form-control" id="" placeholder="Last Name">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Mobile / Phone Number</label>
                        <input type="email" class="form-control" id="" placeholder="+88 0100 000 000">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                        <label for="floatingTextarea2" class="form-label">Your Message</label>
                        <textarea class="form-control" placeholder="Leave a message here" id="floatingTextarea2" style="height: 100px"></textarea>
                        
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-grid gap-2 my-3">
                        <button class="btn btn-primary" type="button">Send Message</button>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-12 col-sm-5">
                  
                </div>
              </div>
            </div>
          </form>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col p-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20654.076233563246!2d90.3443232534138!3d23.777339601282357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1b5b7db2a1b%3A0xac812af0855964ab!2sPMS%20BD!5e0!3m2!1sen!2suk!4v1697644453171!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>


@endsection