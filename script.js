document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // 阻止默认表单提交行为

    let role = document.getElementById('role').value;
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;

    // 构建请求体对象
    let formData = {
        role: role,
        username: username,
        password: password,
        name: name,
        email: email,
    };

    // 发送 AJAX 请求到后端 PHP 文件
    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // 注册成功，重定向到登录页面或其他页面
            window.location.href = 'home.html';
        } else {
            // 注册失败，显示错误消息
            alert('注册失败：' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});
