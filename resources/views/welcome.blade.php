@extends('layouts.app')

@section('content')
  <div id="page-cover" class="page-cover">
    <div class="page-cover-wrapper-fixed">
      <div class="page-cover-bg bg-primary"></div>
      <div class="page-cover-wrap">

        <section id="home" class="d-flex mh-100vh">
          <div class="container align-self-center text-white text-center">
            <div
                class="u-avatar u-avatar-5x u-avatar-md-6x u-avatar-lg-7x u-avatar-modern u-avatar-rounded-circle mx-auto mb-4">
              <img src="demo/images/avatar_small.jpg" alt="">
            </div>
            <h1 class="mb-2 mb-lg-3">Coders Snippet</h1>
            <p class="lead mb-0">Snippet for all developers</p>
            <span class="cover-letter letter-xl">C</span>
          </div>
        </section>

      </div>
    </div>
  </div><!--end .page-cover -->

  <div class="page-content">

    <section id="about">
      <div class="container">
        <div class="section-title h2 text-center mb-5">
          <h2 class="mb-0">About Us</h2>
          <span class="title-letter">A</span>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 d-none d-lg-block">
            <img class="img-fluid w-100 rounded" src="demo/images/avatar.jpg" alt="">
          </div>
          <div class="col-lg-8">
            <p class="mb-5">I’m Amanda Malat a marketing specialist with over five years work experience. Donec sed
              fringilla lectus, non vulputate orci. Integer id libero euismod, interdum ligula vel, porttitor magna. Sed
              euismod maximus finibus. Pellentesque tempus ultricies nisi at cursus. Nulla at nisi tellus. Suspendisse
              potenti.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid blanditiis consequuntur corporis earum
              eligendi, impedit iure iusto magnam nisi obcaecati rem sint suscipit tenetur? Aperiam architecto cumque
              dolorem doloremque dolorum eaque, eveniet, harum iure laudantium molestiae mollitia nemo officia
              perspiciatis provident recusandae rem saepe ut voluptate? Culpa illo impedit qui.</p>
          </div>
        </div>
      </div>
    </section>


    <section id="services" class="pb-0">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-10 col-xl-8 mx-lg-auto text-center">
            <div class="section-title h2 mb-3">
              <h2 class="mb-0">Services</h2>
              <span class="title-letter">S</span>
            </div>
            <p>Fusce massa dolor, mattis sed ultrices ut, placerat ut leo. Donec sed fringilla lectus, non vulputate
              orci. Integer id libero euismod, interdum ligula vel, porttitor magna. Sed euismod maximus finibus.</p>
          </div>
        </div>
        <div class="row my-n2 mx-sm-n2">
          <div class="col-md-6 col-xl-4 py-2 px-md-2">
            <div class="feature-block feature-boxed feature-decorated">
              <div class="feature-icon text-primary mb-3">
                <div>
                  <i class="ti-timer"></i>
                </div>
              </div>
              <h3 class="h4 mb-2">Launch Quickly</h3>
              <p>Quisque ultrices non velit sit amet consectetur. Cras turpis dolor, facilisis a nibh non, ullamcorper
                facilisis mauris. Nulla rutrum arcu sed ligula malesuada, quis condimentum eros sollicitudin.</p>
            </div>
          </div>

          <div class="col-md-6 col-xl-4 py-2 px-md-2">
            <div class="feature-block feature-boxed feature-decorated">
              <div class="feature-icon text-primary mb-3">
                <div>
                  <i class="ti-brush-alt"></i>
                </div>
              </div>
              <h3 class="h4 mb-2">Stylish Design</h3>
              <p>Quisque ultrices non velit sit amet consectetur. Cras turpis dolor, facilisis a nibh non, ullamcorper
                facilisis mauris. Nulla rutrum arcu sed ligula malesuada, quis condimentum eros sollicitudin.</p>
            </div>
          </div>

          <div class="col-md-6 col-xl-4 py-2 px-md-2">
            <div class="feature-block feature-boxed feature-decorated">
              <div class="feature-icon text-primary mb-3">
                <div>
                  <i class="ti-book"></i>
                </div>
              </div>
              <h3 class="h4 mb-2">Well Documented</h3>
              <p>Quisque ultrices non velit sit amet consectetur. Cras turpis dolor, facilisis a nibh non, ullamcorper
                facilisis mauris. Nulla rutrum arcu sed ligula malesuada, quis condimentum eros sollicitudin.</p>
            </div>
          </div>

          <div class="col-md-6 col-xl-4 py-2 px-md-2">
            <div class="feature-block feature-boxed feature-decorated">
              <div class="feature-icon text-primary mb-3">
                <div>
                  <i class="ti-layers"></i>
                </div>
              </div>
              <h3 class="h4 mb-2">Multiple Styles</h3>
              <p>Quisque ultrices non velit sit amet consectetur. Cras turpis dolor, facilisis a nibh non, ullamcorper
                facilisis mauris. Nulla rutrum arcu sed ligula malesuada, quis condimentum eros sollicitudin.</p>
            </div>
          </div>

          <div class="col-md-6 col-xl-4 py-2 px-md-2">
            <div class="feature-block feature-boxed feature-decorated">
              <div class="feature-icon text-primary mb-3">
                <div>
                  <i class="ti-settings"></i>
                </div>
              </div>
              <h3 class="h4 mb-2">Fully Customizable</h3>
              <p>Quisque ultrices non velit sit amet consectetur. Cras turpis dolor, facilisis a nibh non, ullamcorper
                facilisis mauris. Nulla rutrum arcu sed ligula malesuada, quis condimentum eros sollicitudin.</p>
            </div>
          </div>

          <div class="col-md-6 col-xl-4 py-2 px-md-2">
            <div class="feature-block feature-boxed feature-decorated">
              <div class="feature-icon text-primary mb-3">
                <div>
                  <i class="ti-headphone-alt"></i>
                </div>
              </div>
              <h3 class="h4 mb-2">Friendly Support</h3>
              <p>Quisque ultrices non velit sit amet consectetur. Cras turpis dolor, facilisis a nibh non, ullamcorper
                facilisis mauris. Nulla rutrum arcu sed ligula malesuada, quis condimentum eros sollicitudin.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-lg-auto">
            <div class="row mb-5">
              <div class="col-lg-8 mx-lg-auto text-center">
                <div class="section-title h2 mb-3">
                  <h2 class="mb-0">Contact</h2>
                  <span class="title-letter">C</span>
                </div>
                <p>Want to say hello? Want to know more about me? Give me a call or drop me an email and I will get back
                  to you as soon as I can.</p>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-4 mb-5 mb-md-0">
                <div class="feature-block">
                  <div class="feature-icon text-primary mb-4">
                    <div class="mx-auto">
                      <i class="ti-mobile"></i>
                    </div>
                  </div>
                  <p class="text-center">(0091) 1111 1234567<br/>
                    (084) 2222 1234567</p>
                </div>
              </div>

              <div class="col-md-4 mb-5 mb-md-0">
                <div class="feature-block">
                  <div class="feature-icon text-primary mb-4">
                    <div class="mx-auto">
                      <i class="ti-location-pin"></i>
                    </div>
                  </div>
                  <p class="text-center">69 Halsey St, New York, Ny 10002,<br/>
                    United States</p>
                </div>
              </div>

              <div class="col-md-4">
                <div class="feature-block">
                  <div class="feature-icon text-primary mb-4">
                    <div class="mx-auto">
                      <i class="ti-email"></i>
                    </div>
                  </div>
                  <p class="text-center"><a href="mailto:support@example.com"
                                            class="text-dark">support@example.com</a><br/>
                    <a href="mailto:hello@example.com" class="text-dark">hello@example.com</a></p>
                </div>
              </div>
            </div>
            <div class="contact-form">
              <form class="mb-0" id="cf" name="cf"
                    action="https://preview.erilisdesign.com/html/malat/include/sendemail.php" method="post"
                    autocomplete="off">
                <div class="form-row">
                  <div class="form-process"></div>

                  <div class="col-12 col-md-6">
                    <div class="form-group error-text-white">
                      <input type="text" id="cf-name" name="cf-name" placeholder="Enter your name"
                             class="form-control required">
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="form-group error-text-white">
                      <input type="email" id="cf-email" name="cf-email" placeholder="Enter your email address"
                             class="form-control required">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group error-text-white">
                      <input type="text" id="cf-subject" name="cf-subject" placeholder="Subject (Optional)"
                             class="form-control">
                    </div>
                  </div>

                  <div class="col-12 mb-4">
                    <div class="form-group error-text-white">
                      <textarea name="cf-message" id="cf-message" placeholder="Here goes your message"
                                class="form-control required" rows="7"></textarea>
                    </div>
                  </div>

                  <div class="col-12 d-none">
                    <input type="text" id="cf-botcheck" name="cf-botcheck" value="" class="form-control"/>
                  </div>

                  <div class="col-12 text-center">
                    <button class="btn btn-primary" type="submit" id="cf-submit" name="cf-submit">Send Message</button>
                  </div>
                </div>
              </form>
              <div class="contact-form-result text-center"></div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div><!--end .page-content -->
@endsection
