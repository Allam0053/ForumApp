<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <h1>Tambah Pertanyaan</h1>
    <form action="{{ route('storequestion') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="question">Pertanyaan:</label>
            <textarea class="form-control" rows="5" name="question"></textarea>
        </div>

        {{-- kalau sudah ada login --}}
        {{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> --}}
        <input type="number" class="form-control" name="user_id" placeholder="user id">

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>user_id</th>
          <th>question</th>
          <th>created at</th>
          <th>updated at</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($questions as $question)
        <tr>
          <td>{{ $question->id }}</td>
          <td>{{ $question->user_id }}</td>
          <td>{{ $question->question }}</td>
          <td>{{ $question->created_at }}</td>
          <td>{{ $question->updated_at }}</td>
          <td>
              <a class="btn btn-warning" href="{{ route('editquestion', $question->id) }}">Edit</a>
              <a class="btn btn-danger" href="{{ route('deletequestion', $question->id) }}">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>