@extends('blocks.layout')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-7 ">

            <div class="panel panel-default">
                <div class="panel-heading">  <h4 >User Profile</h4></div>
                <div class="panel-body">

                    <div class="box box-info">

                        <div class="box-body">
                            <div class="col-sm-6">
                                <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">

                                    <input id="profile-image-upload" class="hidden" type="file">
                                    <div style="color:#999;" >click here to change profile image</div>
                                    <!--Upload Image Js And Css-->

                                  </div>

                                <br>

                                <!-- /input-group -->
                            </div>
                            <div class="col-sm-6">
                                <h4 style="color:#00b1b1;">{{$user->lastname}} {{$user->name}} {{$user->surname}} </h4></span>
                                <span><p>Aspirant</p></span>
                            </div>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">


                            <div class="col-sm-5 col-xs-6 tital " >Прізвище:</div><div class="col-sm-7 col-xs-6 ">{{$user->lastname}}</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Ім'я:</div><div class="col-sm-7">{{$user->name}}</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >По-батькові:</div><div class="col-sm-7">{{$user->surname}}</div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <form action="{{url('/upload')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                               <div class="form-group">
                                    <label for="upload-file">Upload</label>
                                    <input type="file" name="upload-file" class="form-control"></input>
                                </div>
                                    <input class="btn btn-success" type="submit" value="Upload file" name="submit">
                            </form>


                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


                </div>
            </div>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
        <script>
            $(function() {
                $('#profile-image1').on('click', function() {
                    $('#profile-image-upload').click();
                });
            });
        </script>


    </div>
</div>

@endsection



