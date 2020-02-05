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
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-primary addWx1">添加微信</button>
                    </div>
                    @foreach($layout->columns() as $column)
                        <div class="col-md-{{ $column->width() }}">
                            @foreach($column->fields() as $field)
                                {!! $field->render() !!}
                            @endforeach
                        </div>
                    @endforeach

{{--                        {!! $form->form->UEditor('content', '评论')!!}--}}

{{--                        @if ($form->field('content')->value())--}}
{{--                            <script>--}}
{{--                                setTimeout(function () {--}}
{{--                                    UE.getEditor('content').execCommand('insertHtml', '{!! $form->field('content')->value() !!}')--}}
{{--                                }, 1000)--}}
{{--                                --}}{{--window.onload = function() {--}}
{{--                                --}}{{--    setTimeout(function () {--}}
{{--                                --}}{{--        UE.getEditor('preface_content').execCommand('insertHtml', '{!! json_decode($form->field('content')->value(), true)['preface']['preface_content'] !!}')--}}
{{--                                --}}{{--    }, 1000)--}}
{{--                                --}}{{--}--}}
{{--                            </script>--}}
{{--                        @endif--}}
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
            $('.addWx1').click(function(){
                UE.getEditor('content').execCommand('insertHtml', str)
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

