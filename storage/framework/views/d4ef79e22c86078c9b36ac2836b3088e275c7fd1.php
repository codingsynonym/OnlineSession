<audio id="chat-ring">
    <source src="<?php echo e(url('resources/assets/admin/tones/chat-ring.mp3')); ?>" type="audio/mp3" />
    <source src="<?php echo e(url('resources/assets/admin/tones/chat-ring.aac')); ?>" type="audio/aac" />
    <source src="<?php echo e(url('resources/assets/admin/tones/chat-ring.ogg')); ?>" type="audio/ogg" />
    <source src="<?php echo e(url('resources/assets/admin/tones/chat-ring.wav')); ?>" type="audio/wav" />
</audio>
<script>
    $(document).ready(function () {
        var mCount = 0;
        var InitialTitle = $('title').html();
        setInterval(function () {
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('admin/get-chat')); ?>",
                'headers': {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                dataType: "JSON",
                success: function (data) {
                    if (data.AllMsgs != "0") {
                        if (mCount < data.AllMsgs) {
                            $("#chat-ring")[0].play();
                            $('title').html('('+data.AllMsgs+') ' + InitialTitle);
                        }
                        mCount = data.AllMsgs;
                        $('#all-ajax-msg').show();
                        $('#all-ajax-msg span').html(data.AllMsgs);
                    } else {
                        $('#all-ajax-msg').hide();
                        $('#all-ajax-msg span').html('');
                    }
                    if (data.Chat && data.Chat != "" && data.Chat.TotalMsgs != 0) {
                        $('#faculty-ajax-msg').show();
                        $('#faculty-ajax-msg span').html(data.Chat.TotalMsgs);
                    } else {
                        $('#faculty-ajax-msg').hide();
                        $('#faculty-ajax-msg span').html('');
                    }
                    if (data.StaffChat && data.StaffChat != "" && data.StaffChat.TotalMsgs != 0) {
                        $('#staff-ajax-msg').show();
                        $('#staff-ajax-msg span').html(data.StaffChat.TotalMsgs);
                    } else {
                        $('#staff-ajax-msg').hide();
                        $('#staff-ajax-msg span').html('');
                    }
                },
                complete: function () {

                }
            });
        },
                5000);
    });
</script>
