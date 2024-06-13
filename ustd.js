var role = ''; // 在這裡設置用戶的角色，可以是'teacher'或'student'

// 根據用戶角色動態生成課程列表
var courseList = document.getElementById('course-list');
if (role === 'teacher') {
    courseList.innerHTML = `
        <ul>
            <li>課程1 - <a href="manage_course1.php">管理</a></li>
            <li>課程2 - <a href="manage_course2.php">管理</a></li>
            <!-- 添加更多教師相關的課程 -->
        </ul>
    `;
} else if (role === 'student') {
    courseList.innerHTML = `
        <ul>
            <li>課程1 - <a href="view_course1.php">查看</a></li>
            <li>課程2 - <a href="view_course2.php">查看</a></li>
            <!-- 添加更多學生相關的課程 -->
        </ul>
    `;
}