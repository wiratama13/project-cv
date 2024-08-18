<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My CV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
     ul {
          padding: 0;
          margin: 0;
          list-style: none; /* Menghilangkan bullet points */
      }

      li {
          margin: 0;
          padding: 0;
      }
  </style>
</head>

<body>
  <div class="container my-5">
    <header class="text-center mb-5">
      <h3 class="display-4">{{ $user->name }}</h3>
      <p class="lead">{{ $user->posisi }} || {{ $user->email }} || {{ $user->no_hp }}</p>
    </header>

    <!-- About Me Section -->
    <section class="mb-5">
      <h2 class="h4">About Me</h2>
      <p>
        {{ $about->tentang }}
      </p>
    </section>

    <!-- Riwayat Karir Section -->
    <section class="mb-5">
      <h2 class="h4">Riwayat Karir</h2>
      <ul class="list-group">
        @foreach ($karirs as $karir)
        
        <li class="list-group-item">
          <h5>{{ $karir->posisi }} at {{ $karir->perusahaan }}</h5>
          <p><small>{{ $karir->formatted_tanggal_mulai }} sd {{ $karir->formatted_tanggal_selesai }}</small></p>
          <ul>
              @if($karir->deskripsi)
                  @foreach(explode("\n", $karir->deskripsi) as $line)
                      <li >{{ trim($line) }}</li>
                  @endforeach
              @else
                  <li>Tidak ada deskripsi.</li>
              @endif
          </ul>
        </li>
        @endforeach
      </ul>
    </section>

    <!-- Pendidikan Section -->
    <section class="mb-5">
      <h2 class="h4">Pendidikan</h2>
       <ul class="list-group">
        @foreach ($pendidikans as $pendidikan)
        
        <li class="list-group-item">
          <h5>{{ $pendidikan->tingkat }} at {{ $pendidikan->institusi }}</h5>
          <p><small>{{ $pendidikan->formatted_tanggal_mulai }} sd {{ $pendidikan->formatted_tanggal_selesai }}</small></p>
          <ul>
              @if($pendidikan->deskripsi)
                  @foreach(explode("\n", $pendidikan->deskripsi) as $line)
                      <li >{{ trim($line) }}</li>
                  @endforeach
              @else
                  <li>Tidak ada deskripsi.</li>
              @endif
          </ul>
        </li>
        @endforeach
      </ul>
    </section>

    <!-- Keahlian Section -->
    <section class="mb-5">
      <h2 class="h4">Keahlian</h2>
      <div class="d-flex flex-wrap gap-2">
        @foreach ($keahlianUser as $user)
            <span class="btn btn-primary fs-5">{{ $user->keahlian }}</span>
        @endforeach
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
     window.onload = function() {
      window.print();
    };
  </script>
</body>

</html>
