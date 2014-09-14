@extends('layout', ["footer" => false])

@section('custom-css')
@parent
{{ HTML::style('/css/bootstrap-multiselect.css') }}
<style type="text/css" xmlns="http://www.w3.org/1999/html">
    .form-horizontal {
        margin-top: 30px;
        overflow: visible;
    }

    form > div > label {
        font-size: 14px;
    }
</style>
@stop

@section('custom-js')
@parent
{{ HTML::script('/js/bootstrap-multiselect.js') }}
<script type="text/javascript">
    $(document).ready(function () {
        $('.multiselect').multiselect({
            enableFiltering: true,
            filterBehavior: 'text',
            enableCaseInsensitiveFiltering: true,
            maxHeight: 130,
            buttonWidth: 265
        });
    });
</script>
@stop

@section('content')
<div class="row-fluid">
    <div class="span12">
        <h3 class="met_title_with_childs pull-left">
            UPDATE EXISTING LIST<span class="met_subtitle">UPDATING: {{{ $list->title }}}</span>
        </h3>

        <div class="clearfix"></div>
        <hr>
        <form action="{{{ URL::to('/lists/update/submit') }}}" method="post" class="form-horizontal">
            <input type="hidden" name="list_id" value="{{{ $list->id }}}">

            <div class="control-group">
                <label class="control-label" for="inputTitle">List title</label>

                <div class="controls">
                    <input name="title" class="input-xxlarge" type="text" id="inputTitle" placeholder="Title" value="{{{ $list->title }}}" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputDescription">Description</label>

                <div class="controls">
                    <textarea name="description" class="input-xxlarge" rows="2" id="inputDescription" required>{{{ $list->description }}}</textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputAnime">Select anime (min. 7)</label>

                <div class="controls">
                    <?php $animes = DB::table('series')->select('id', 'name')->orderBy('name', 'ASC')->get() ?>
                    <?php $current_anime_ids = explode(",", $list->anime_ids); ?>
                    <select class="multiselect" name="anime_ids[]" id="inputAnime" multiple="multiple">
                        @foreach($animes as $anime)
                        @if (in_array($anime->id, $current_anime_ids))
                        <option value="{{{$anime->id}}}" selected>{{{$anime->name}}}</option>
                        @else
                        <option value="{{{$anime->id}}}">{{{$anime->name}}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">Submit list</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop