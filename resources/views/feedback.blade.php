<form method="post" action={{route('feedback')}}>
    <div class="form-group">
        <label for="email">Email </label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="name" name="name">
    </div>
    <div class="form-group">
        <label for="feedback">Feedback</label>
        <textarea class="form-control" id="feedback" rows="3" name="feedback"></textarea>
    </div>
</form>
