<div style="background-color: rgba(175, 190, 207, 0.47)">
                <div class="content content-full">
                    <!-- Footer Navigation -->
                    <div class="row items-push-2x mt-30">
                        <div class="col-6 col-md-4">
                            <h3 class="h5 font-w700">Account</h3>
                            <ul class="list list-simple-mini font-size-sm">
                              <li>
                                  <a class="link-effect font-w600" href="{{route('profile.edit', Auth::user()->id)}}">Edit Profile</a>
                              </li>

                              @if (Auth::user()->newsletter == 1)
                                <li>
                                    <a class="link-effect font-w600" href="{{route('profile.edit', Auth::user()->id)}}">Unsubscribe to our newsletter</a>
                                </li>
                              @endif

                                <li>
                                    <a class="link-effect font-w600" href="{{route('password.request')}}">Change your password</a>
                                </li>
                                @if (Auth::user()->email_verified_at == NULL)
                                  <li>
                                      <a class="link-effect font-w600" href="{{route('verification.notice')}}">Confirm your email</a>
                                  </li>
                                @endif

                                {{-- <li>
                                    <a class="link-effect font-w600" href="javascript:void(0)">Link #5</a>
                                </li>
                                <li>
                                    <a class="link-effect font-w600" href="javascript:void(0)">Link #6</a>
                                </li> --}}
                            </ul>
                        </div>
                         <div class="col-6 col-md-4">
                            {{-- <h3 class="h5 font-w700">Second List</h3>
                            <ul class="list list-simple-mini font-size-sm">
                                <li>
                                    <a class="link-effect font-w600" href="javascript:void(0)">Link #1</a>
                                </li>
                                <li>
                                    <a class="link-effect font-w600" href="javascript:void(0)">Link #2</a>
                                </li>
                                <li>
                                    <a class="link-effect font-w600" href="javascript:void(0)">Link #3</a>
                                </li>
                                <li>
                                    <a class="link-effect font-w600" href="javascript:void(0)">Link #4</a>
                                </li>
                                <li>
                                    <a class="link-effect font-w600" href="javascript:void(0)">Link #5</a>
                                </li>
                                <li>
                                    <a class="link-effect font-w600" href="javascript:void(0)">Link #6</a>
                                </li>
                            </ul> --}}
                        </div>
                        <div class="col-md-4">
                            <h3 class="h5 font-w700">Company X</h3>
                            <div class="font-size-sm mb-30">
                                Frosinone, Lazio, IT<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </div>
                          @if(Auth::user()->newsletter == 0)
                            <h3 class="h5 font-w700">Our Newsletter</h3>
                            <form action="{{route('sub_newsletter', Auth::user()->id)}}" method="POST" id="form_for_sub">

                              @method('PUT')
                              @csrf
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email_sub" name="email_sub" placeholder="Your email..">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-square btn-secondary" onclick="updateSub()" id="submit_sub">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                          @endif

                            <script>

                            function updateSub(){
                                var data = new FormData();
                                data.append('email_sub', document.getElementById('email_sub').value);
                                var token = $('input[name=_token]');


                                $.ajax({
                                          url: "{{route('sub_newsletter', Auth::user()->id)}}",
                                          type: "POST",
                                          data: data,
                                          contentType: false,
                                          processData: false,
                                          headers: {
                                              'X-CSRF-TOKEN': token.val()
                                          },
                                          success: function(data)
                                          {
                                            if(data.status == 'success'){
                                              alert('SUCCESS: ' + data.message);

                                            }else if(data.status == 'failure'){
                                              alert('ERROR: ' + data.message);
                                            }

                                            window.location.reload();
                                          }

                                        });


                            };



                            </script>

                        </div>
                    </div>
                    <!-- END Footer Navigation -->

                    <!-- Copyright Info -->
                    <div class="font-size-sm clearfix border-t pt-20 pb-10">
                        {{-- <div class="float-right">
                            Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>

                        </div> --}}
                        <div class="float-left">
                          <a class="font-w600" href="https://1.envato.market/95j" target="_blank">mydailydream</a> &copy; <span class="js-year-copy"></span>
                        </div>
                    </div>
                    <!-- END Copyright Info -->
                </div>
              </div>
