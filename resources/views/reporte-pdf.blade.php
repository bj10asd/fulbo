
<table>
    @foreach($user as $users)
        <tr>
        <td><p>{{ $users->title }}</p></td>
        <td><p>{{ $users->start }}</p></td>
        <td><p>{{ $users->end }}</p></td>
        <td><p>{{ $users->nombre_del_predio }}</p></td>
        <td><p>{{ $users->detalles_de_canchas }}</p></td>
        </tr>
    @endforeach
</table>