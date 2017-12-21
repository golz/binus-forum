<div class="search-box" style="">
    <form method="get" id="topic-search" action="{{ url('topic/'.$topic_id.'/search') }}">
        {{ csrf_field() }}
        <fieldset>
            <div class="error">
                @if($errors->has('keyword'))
                    {{$errors->first('keyword')}}
                @endif
            </div>
            <input class="inputbox search"  type="search" name="keyword" id="search" size="20" placeholder="Search this topic…" />
            <button class="button" type="submit" title="Search"><i class="fa fa-search"></i></button>
        </fieldset>
    </form>
</div>
