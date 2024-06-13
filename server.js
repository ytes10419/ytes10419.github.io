const express = require('express');
const cors = require('cors');
const mysql = require('mysql');

const app = express();
const port = 3000;

// 中间件
app.use(cors());
app.use(express.json());

// 创建数据库连接
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'school_db'
});

db.connect(err => {
    if (err) {
        console.error('Error connecting to the database:', err);
        return;
    }
    console.log('Connected to MySQL Database.');
});

// 根路径路由
app.get('/', (req, res) => {
    res.send('Welcome to the LMS API');
});

// 创建用户
app.post('/users', (req, res) => {
    const { name, email } = req.body;
    const query = 'INSERT INTO users (name, email) VALUES (?, ?)';
    db.query(query, [name, email], (err, result) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.status(201).send('User created successfully.');
    });
});

// 获取所有用户
app.get('/users', (req, res) => {
    const query = 'SELECT * FROM users';
    db.query(query, (err, results) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.status(200).json(results);
    });
});

// 获取单个用户
app.get('/users/:id', (req, res) => {
    const { id } = req.params;
    const query = 'SELECT * FROM users WHERE id = ?';
    db.query(query, [id], (err, result) => {
        if (err) {
            return res.status(500).send(err);
        }
        if (result.length === 0) {
            return res.status(404).send('User not found.');
        }
        res.status(200).json(result[0]);
    });
});

// 更新用户
app.put('/users/:id', (req, res) => {
    const { id } = req.params;
    const { name, email } = req.body; // 修正变量名
    const query = 'UPDATE users SET name = ?, email = ? WHERE id = ?';
    db.query(query, [name, email, id], (err, result) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.status(200).send('User updated successfully.');
    });
});

// 删除用户
app.delete('/users/:id', (req, res) => {
    const { id } = req.params;
    const query = 'DELETE FROM users WHERE id = ?';
    db.query(query, [id], (err, result) => {
        if (err) {
            return res.status(500).send(err);
        }
        res.status(200).send('User deleted successfully.');
    });
});

// 提交分数
app.post('/submit-score', (req, res) => {
    const { user_id, score } = req.body; // 保持变量名一致
    const query = 'INSERT INTO scores (user_id, score) VALUES (?, ?)';
    db.query(query, [user_id, score], (err, result) => {
        if (err) {
            return res.status(500).send({ success: false, error: err.message });
        }
        res.status(201).send({ success: true, message: 'Score saved successfully.' });
    });
});

// 启动服务器
app.listen(port, '0.0.0.0', () => {
    console.log(`Server is running on port ${port}`);
});
