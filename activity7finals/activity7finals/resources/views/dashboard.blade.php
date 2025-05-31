<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --card-bg: rgba(255, 255, 255, 0.85);
            --shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            min-height: 100vh;
            padding: 20px;
            margin: 0;
            color: var(--dark-color);
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 15px;
            background: var(--card-bg);
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo i {
            font-size: 2rem;
            color: var(--primary-color);
        }
        
        .logo h1 {
            margin: 0;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary-color), var(--success-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 20px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: var(--primary-color);
        }
        
        .stat-card h3 {
            font-size: 1.5rem;
            margin: 10px 0;
            color: var(--dark-color);
        }
        
        .stat-card p {
            margin: 0;
            color: #6c757d;
        }
        
        .chart-container {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
            margin-bottom: 30px;
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .chart-header h2 {
            margin: 0;
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .chart-actions button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
            font-weight: 500;
        }
        
        .chart-actions button:hover {
            background: var(--secondary-color);
        }
        
        .chart-wrapper {
            width: 100%;
            height: 400px;
            position: relative;
        }
        
        .recent-activity {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
        }
        
        .recent-activity h3 {
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 20px;
        }
        
        .activity-item {
            display: flex;
            gap: 15px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: rgba(67, 97, 238, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            flex-shrink: 0;
        }
        
        .activity-content h4 {
            margin: 0 0 5px 0;
            font-size: 1rem;
        }
        
        .activity-content p {
            margin: 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .chart-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .chart-actions {
                width: 100%;
            }
            
            .chart-actions button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                <h1>Analytics Dashboard</h1>
            </div>
            <div class="user-info">
                <div class="user-avatar">JD</div>
                <div>
                    <div>John Doe</div>
                    <small>Administrator</small>
                </div>
            </div>
        </div>
        
        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h3>5,248</h3>
                <p>Total Users</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-calendar-check"></i>
                <h3>1,208</h3>
                <p>Active Today</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-chart-bar"></i>
                <h3>42.8%</h3>
                <p>Growth Rate</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-globe"></i>
                <h3>28</h3>
                <p>Countries</p>
            </div>
        </div>
        
        <div class="chart-container">
            <div class="chart-header">
                <h2>User Registrations Per Month</h2>
                <div class="chart-actions">
                    <button><i class="fas fa-download"></i> Export Report</button>
                </div>
            </div>
            
            <div class="chart-wrapper">
               
                <div style="width:100%; height:100%;">
                    <canvas id="usersChart" width="400" height="200"></canvas>
                </div>
                <!-- Original Chart Code Ends Here -->
            </div>
        </div>
        
        <div class="recent-activity">
            <h3><i class="fas fa-list"></i> Recent Activity</h3>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="activity-content">
                        <h4>New user registered</h4>
                        <p>Sarah Johnson joined the platform 2 hours ago</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="activity-content">
                        <h4>Monthly report generated</h4>
                        <p>August performance report is ready for review</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="activity-content">
                        <h4>System update completed</h4>
                        <p>Version 2.3.1 deployed successfully</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="activity-content">
                        <h4>Notification settings updated</h4>
                        <p>John Doe changed email preferences</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Original JavaScript Code Preserved -->
    <script>
        const ctx = document.getElementById('usersChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Users',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(75, 192, 192, 0.4)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>