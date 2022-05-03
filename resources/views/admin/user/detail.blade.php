<div class="author-box">
    <div class="author-box-left">
        @switch($data->profile_picture)
            @case(null)
                <img alt="image" src="{{ asset("assets/img/avatar/avatar-1.png") }}" class="rounded-circle author-box-picture" width="55" >
                @break
            @case(!null)
                <img alt="image" src="{{ asset($data->profile_picture) }}" class="rounded-circle author-box-picture" width="55" >
                @break
            @default

        @endswitch
        <div class="clearfix"></div>
        @switch($data->role)
            @case('admin')
                <div class="btn btn-primary mt-3">Admin</div>
                @break

            @default

        @endswitch

      </div>
      <div class="author-box-details">
        <div class="author-box-name">
          {{ $data->name }}
        </div>
        <div class="author-box-job">{{ $data->position_kpb == null ? '-' : $data->position_kpb  }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ $data->position_department == null ? '-' : $data->position_department }}</div></div>
        <div class="author-box-description">
            <table>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>{{ $data->gender == 'M' ? 'Male' : 'Female' }}</td>
                </tr>
                <tr>
                    <td>Work Unit</td>
                    <td>: </td>
                    <td>{{ $data->work_unit == null ? '-' : $data->work_unit }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>{{ $data->address == null ? '-' : $data->address }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td>{{ $data->no_hp == null ? '-' : $data->no_hp }}</td>
                </tr>
            </table>
        </div>
      </div>

</div>
