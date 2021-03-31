const EmployeeComponent = {
    name: 'employee-component',
    props: [
        'employee'
    ],
    template: `
        <div class="employeeCardWrap" :id="'employee-'+employee.employee_id" >                 
            <div class="employeeCard">
                <div class="avatar">
                <img :src='"./images/avatars/" + employee.employee_avatar' 
                        :alt="employee.employee_name">
                </div>
                <div class="infoWrap">
                    <h2 class="employeeTitle"> 
                        {{ employee.employee_name }}
                    </h2>
                    <span class="line"></span>
                    <h3 class="role">
                        {{ employee.employee_position }}
                    </h3>
                </div>
            </div>            
        </div>
    `
};

export default EmployeeComponent;