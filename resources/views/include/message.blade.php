
@if (\Session::has('success'))
   <script>
    alertify.set('notifier','position', 'top-right');
    alertify.success('Success');
   </script>
@endif
@if ($message=Session::get('error'))
  <script>
  alertify.set('notifier','position', 'top-right');
  alertify.error('Error');
 </script>
@endif
@if ($message=Session::get('login'))
  <script>
  alertify.set('notifier','position', 'top-right');
  alertify.error('Login First');
 </script>
@endif
