<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Potongan</th>
        <th>Isi</th>
        <th>Tanggal</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $brt)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $brt->judul_news }}</td>
          <td>{{ $brt->potongan_news}}</td>
          <td>{{ $brt->isi_news }}</td>
          <td>{{ $brt->tgl_news }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>