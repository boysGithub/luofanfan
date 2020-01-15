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
                        {!! $form->form->UEditor('preface_content', '前言内容')->execCommand('insertHtml', 'ffhasfjkjas')!!}
                        @if (json_decode($form->field('content')->value(), true)['preface']['preface_content'])
{{--                            {!! json_decode($form->field('content')->value(), true)['preface']['preface_content'] !!}--}}
                            <script>
                                window.onload = function() {
                                    setTimeout(function () {
                                        console.log(1111)
                                        UE.getEditor('preface_content').execCommand('insertHtml', '{!! json_decode($form->field('content')->value(), true)['preface']['preface_content'] !!}')
                                    }, 3000)
                                }
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
                        {!! $form->form->text('trip_title_'.($i+1)) !!}
                        {!! $form->form->UEditor('trip_content_'.($i+1)) !!}
{{--                        {!! $form->form->multipleImage('图片'.($i+1))->removable() !!}--}}
                    @endfor
                @endif
            </div>
        @endif

        <script>
            $('.trip').change(function(){
                // alert(1111);
            })
            $('.addWx').click(function(){
                var a = $(this).attr('lable')
                UE.getEditor('trip_content_'+a).execCommand('insertHtml', '<span class="bnname"></span>金牌管家<span class="wxname"></span>的微信：<span class="weixin"></span>')
            })
            $('.addWx1').click(function(){
                UE.getEditor('preface_content').execCommand('insertHtml', '<span class="bnname"></span>金牌管家<span class="wxname"></span>的微信：<span class="weixin"></span>')
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

