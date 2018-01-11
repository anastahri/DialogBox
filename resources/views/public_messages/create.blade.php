            <div class="row">
              <section class="col-lg-12">               
                <div class="box box-solid box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Post a message</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="box-body chat">
                    <div class="item">
                      <form method="post" action="{{url('/public_messages')}}">
                        {{csrf_field()}}
                        <div class="input-group">
                          <div class="form-group">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control"/>
                          </div>
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-flat">Add Message</button>
                          </span>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </section>
            </div>