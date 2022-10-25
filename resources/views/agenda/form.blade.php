<label for="id">ID</label>
<input type="text" name="id" id="id" value="@if (isset($dados['id'])) {{ $dados['id'] }} @endif" disabled><br>

<label for="name">Nome</label>
<input type="text" name="name" id="name" value="@if (isset($dados['name'])) {{ $dados['name'] }} @endif"><br>

<label for="phone">Telefone</label>
<input type="text" name="phone" id="phone" value="@if (isset($dados['phone'])) {{ $dados['phone'] }} @endif"><br>

<label for="email">E-mail</label>
<input type="text" name="email" id="email" value="@if (isset($dados['email'])) {{ $dados['email'] }} @endif"><br>

<input type="submit">