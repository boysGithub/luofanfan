<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $form->title() }}</h3>

        <div class="box-tools">
            {!! $form->renderTools() !!}
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    {!! $form->open(['class' => "form-horizontal"]) !!}

    <div class="box-body">
        @if(!$tabObj->isEmpty())
            @include('admin::form.tab', compact('tabObj'))
        @else
            <div class="fields-group">
                @if($form->hasRows())

                    @foreach($form->getRows() as $row)
                        {!! $row->render() !!}
                    @endforeach
                @else
                    @foreach($layout->columns() as $column)
                        <div class="col-md-{{ $column->width() }}">
                            @foreach($column->fields() as $field)
                                {!! $field->render() !!}
                            @endforeach
                        </div>
                    @endforeach
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-primary addWx1">添加微信</button>
                        </div>


                        {!! $form->form->text('preface_title', '前言标题')->default(json_decode($form->field('content')->value(), true)['preface']['preface_title']) !!}
                        {!! $form->form->UEditor('preface_content', '前言内容')!!}
                        @if (json_decode($form->field('content')->value(), true)['preface']['preface_content'])
                            <script>
                                setTimeout(function () {
                                    UE.getEditor('preface_content').execCommand('insertHtml', '{!! json_decode($form->field('content')->value(), true)['preface']['preface_content'] !!}')
                                }, 1000)
                                {{--window.onload = function() {--}}
                                {{--    setTimeout(function () {--}}
                                {{--        UE.getEditor('preface_content').execCommand('insertHtml', '{!! json_decode($form->field('content')->value(), true)['preface']['preface_content'] !!}')--}}
                                {{--    }, 1000)--}}
                                {{--}--}}
                            </script>
                        @endif


                        <div class="collapse in" id="fieldset-5e15a679c06cc">
                            <div style="height: 20px; border-bottom: 1px solid #eee; text-align: center;margin-top: 20px;margin-bottom: 20px;">
  <span style="font-size: 18px; background-color: #ffffff; padding: 0 10px;">
    行程简介
  </span>
                            </div>
                        </div>
                        @for($i=0; $i < $form->field('trip')->value(); $i++)
                            {!! $form->form->text('D'.($i+1), '第'.($i+1).'天')->default(json_decode($form->field('content')->value(), true)['itinerary']['D'.($i+1)]) !!}
                        @endfor
                        <div class="collapse in" id="fieldset-5e15a679c06cc">
                            <div style="height: 20px; border-bottom: 1px solid #eee; text-align: center;margin-top: 20px;margin-bottom: 20px;">
  <span style="font-size: 18px; background-color: #ffffff; padding: 0 10px;">
    行程介绍
  </span>
                            </div>
                        </div>
                    @for($i=0; $i < $form->field('trip')->value(); $i++)
                            <div class="collapse in" id="fieldset-5e15a679c06cc">
                                <div style="height: 20px; border-bottom: 1px solid #eee; text-align: center;margin-top: 20px;margin-bottom: 20px;">
  <span style=" background-color: #ffffff; padding: 0 10px;">
    第{{$i+1}}天
  </span>
                                </div>
                            </div>
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-primary addWx" lable="{{$i+1}}">添加微信</button>
                            </div>
                        {!! $form->form->text('trip_title_'.($i+1))->default(json_decode($form->field('content')->value(), true)['arrange']['D'.($i+1)]['trip_title']) !!}
                        {!! $form->form->UEditor('trip_content_'.($i+1)) !!}
                        @if (json_decode($form->field('content')->value(), true)['arrange']['D'.($i+1)]['trip_content'])
                            <script>
                                setTimeout(function () {
                                    UE.getEditor("trip_content_{{$i + 1}}").execCommand('insertHtml', '{!! json_decode($form->field('content')->value(), true)['arrange']['D'.($i+1)]['trip_content'] !!}')
                                }, 1000)
                                {{--window.onload = function() {--}}
                                {{--    setTimeout(function () {--}}
                                {{--        UE.getEditor("trip_content_{{$i + 1}}").execCommand('insertHtml', '{!! json_decode($form->field('content')->value(), true)['arrange']['D'.($i+1)]['trip_content'] !!}')--}}
                                {{--    }, 1000)--}}
                                {{--}--}}
                            </script>
                        @endif
                    @endfor
                        <div class="collapse in" id="fieldset-5e15a679c06cc">
                            <div style="height: 20px; border-bottom: 1px solid #eee; text-align: center;margin-top: 20px;margin-bottom: 20px;">
  <span style="font-size: 18px; background-color: #ffffff; padding: 0 10px;">
    注意事项
  </span>
                            </div>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-primary addWx2">添加微信</button>
                        </div>
                    {!! $form->form->text('take_care_title', '注意事项标题')->default(json_decode($form->field('content')->value(), true)['take_care']['take_care_title']) !!}
                    {!! $form->form->UEditor('take_care_content', '注意事项内容') !!}
                    @if (json_decode($form->field('content')->value(), true)['take_care']['take_care_content'])
                        <script>
                            setTimeout(function () {
                                UE.getEditor("take_care_content").execCommand('insertHtml', '{!! json_decode($form->field('content')->value(), true)['take_care']['take_care_content'] !!}')
                            }, 1000)
                            {{--window.onload = function() {--}}
                            {{--    setTimeout(function () {--}}
                            {{--        UE.getEditor("take_care_content").execCommand('insertHtml', '{!! json_decode($form->field('content')->value(), true)['take_care']['take_care_content'] !!}')--}}
                            {{--    }, 1000)--}}
                            {{--}--}}
                        </script>
                    @endif
                @endif
            </div>
        @endif

        <script>
            var str = "<span class=\"bnname\"><"
            str += "/span>金牌管家"
            str += "<span class=\"wxname\"><"
            str += "/span>的微信："
            str += "<span class=\"weixin\"><"
            str += "/span>"
            $('.trip').change(function(){
                // alert(1111);
            })
            $('.addWx').click(function(){
                var a = $(this).attr('lable')
                UE.getEditor('trip_content_'+a).execCommand('insertHtml', str)
            })
            $('.addWx1').click(function(){
                UE.getEditor('preface_content').execCommand('insertHtml', str)
            })

            $('.addWx2').click(function(){
                UE.getEditor('take_care_content').execCommand('insertHtml', str)
            })

            /**
             * <span class="bnname"></span>金牌管家<span class="wxname"></span>的微信：<span class="weixin"></span>
             */
        </script>
    </div>
    <!-- /.box-body -->

    {!! $form->renderFooter() !!}

    @foreach($form->getHiddenFields() as $field)
        {!! $field->render() !!}
    @endforeach

<!-- /.box-footer -->
    {!! $form->close() !!}
</div>

