@extends('blocks.layout')

@section('content')


<div class="container" style=" margin-top: 5%; margin-bottom:5%">
    <div class="row">

        <div class="col-md-7 " >

            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #10c7bf; color: #fff">  <h4 >User Profile</h4></div>
                <div class="panel-body">

                    <div class="box box-info">

                        <div class="box-body" style="line-height: 2.2">
                            <div class="col-sm-6">
                                    <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">

                                    <!-- <input id="profile-image-upload" class="hidden" type="file"> -->
                                    <!-- <div style="color:#999;" >click here to change profile image</div> -->
                                    <!-- Upload Image Js And Css -->

                                  </div>

                                <br>

                                <!-- /input-group -->
                            </div>
                            <div class="col-sm-6">
                                <h4 style="color:#00b1b1;">{{$user->lastname}} {{$user->name}} {{$user->surname}} </h4></span>
                                <!-- @if($user->hasRole($user->roles)) -->
                                <span><p>{{$user->roles[0]->name}}</p></span>
                                <!-- @endif -->
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
                            
                            @if($user->group != NULL)
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Навчальні дисципліни:</div><div class="col-sm-7">{{$user->group->disciplines[0]->discipline_title}}</div>                           

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Оцінки:</div><div class="col-sm-7">{{$user->mark[0]->mark}}</div>  

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                                <div class="col-sm-5 col-xs-6 tital " >Спеціальність:</div><div class="col-sm-7">{{$user->group->profession->specialty_title}}</div>
                            @endif
                            
                            @if($user->birthday != NULL)
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                                <div class="col-sm-5 col-xs-6 tital " >День народження:</div><div class="col-sm-7">{{$user->birthday->format('d-m-Y') }}</div>
                            @endif
                            
                            @if($user->group != NULL)
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                                <div class="col-sm-5 col-xs-6 tital " >Група:</div><div class="col-sm-7">{{$user->group->group_number }}</div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                                <div class="col-sm-5 col-xs-6 tital " >Куратор:</div><div class="col-sm-7">{{$user->group->curator->lastname }} {{$user->group->curator->name }} {{$user->group->curator->surname }}</div>
                            @endif
                        
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

<!-- <div class="fb fb__1_3">
<div>
    <table cellpadding="0" cellspacing="0" width="100px" align="center">
<tr>
<td colspan="3" class="top">Мой сайт</td>
</tr>
<tr>
<td class="left_col">Меню</td>
<td class="center_col">Ширина ячейки в данном случае зависит от величины монитора или размера окна браузера.</td>
<td class="right_col">Ссылки</td>
</tr>
<tr>
<td colspan="3" class="foot">&copy; Все права защищены</td>
</tr>
</table> 
</div>

  </div> -->




@endsection



