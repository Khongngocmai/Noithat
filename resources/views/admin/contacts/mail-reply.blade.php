<html>
    <body>
        <p>Họ tên: {{ $contact->hoten }}</p>
        <p>Email: {{ $contact->email }}</p>
        <p>Nội dung: {!! $contact->noidung !!}</p>
        <p>Cảm ơn quý khách đã gửi liên hệ cho chúng tôi, dưới đây là nội dung phản hồi:</p>
        <p>{!! $reply !!}</p>
    </body>
</html>