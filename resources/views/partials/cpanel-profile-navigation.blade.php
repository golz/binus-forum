<ul>
    <li @if(Request::is('user/cpanel/profile*')) id="active-subsection" @endif>
        <a href="{{ url('user/cpanel/profile') }}"><span>Edit profile</span></a>
    </li>
    <li @if(Request::is('user/cpanel/signature*')) id="active-subsection" @endif>
        <a href="{{ url('user/cpanel/signature') }}"><span>Edit signature</span></a>
    </li>
    <li @if(Request::is('user/cpanel/avatar*')) id="active-subsection" @endif>
        <a href="{{ url('user/cpanel/avatar') }}"><span>Edit avatar</span></a>
    </li>
    <li @if(Request::is('user/cpanel/accountSetting*')) id="active-subsection" @endif>
        <a href="{{ url('user/cpanel/accountSetting') }}"><span>Edit account settings</span></a>
    </li>
</ul>
