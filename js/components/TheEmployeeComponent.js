const EmployeeComponent = {
    name: 'employee-component',
    props: [
        'employee'
    ],
    template: `
        <div :id="'employee-'+employee.employee_id" >                 
            <div class="employeeCard">
                <div class="avatar">
                <img :src='"./images/avatars/" + employee.employee_avatar' 
                        :alt="employee.employee_name">
                </div>
                <h2 class="employeeTitle"> 
                    {{ employee.employee_name }}
                </h2>
                <span class="line"></span>
                <h3 class="role">
                     {{ employee.employee_position }}
                </h3>
            </div>            
        </div>
    `
};

export default EmployeeComponent;