document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contactForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // 阻止表单默认提交行为
        const formData = new FormData(form); // 获取表单数据

        fetch('process_form.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            alert(data); // 显示来自服务器的响应消息
            form.reset(); // 重置表单
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
        });
    });
});
