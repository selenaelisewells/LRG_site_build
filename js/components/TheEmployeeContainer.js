import EmployeeComponent from './TheEmployeeComponent';

// SectionsContainer
const EmployeeContainer = {
    name: 'employee-container',
    components: {
        EmployeeComponent
    },
    data: () => {
        return {
            employees: [{
                    employee_name: 'Harry Potter',
                    employee_position: 'Wizard',
                    employee_avatar: 'VICEPRESIDENT.svg'
                },
                {
                    employee_name: 'Sandy Rivers',
                    employee_position: 'Assignor Cheif',
                    employee_avatar: 'ASSIGNOR1.svg'
                },
                {
                    employee_name: 'Potato Sam',
                    employee_position: 'Potato',
                    employee_avatar: 'SECRETARY.svg'
                }


            ],

        }
    },
    // Called when the component is rendered on the webpage
    created() {
        // Splits the string into an array devided by '/'s
        const urlSegments = window.location.toString().split('/')

        // Get our sections (REPLACE WITH ACTUAL API ROUTE)---- This depends on Elena
        fetch(`${urlSegments.slice(0, urlSegments.length - 1).join('/')}/api/read.php?employees=true`)
            .then(res => res.json())
            .then(data => {
                this.employees = data;
            });
    },
    template: `
    <div class="employeeStructureContainer">
        <employee-component v-for="employee in employees" :key="employee.id" :employee="employee"></employee-component>
    </div>
    `
}

// Export as module
export default EmployeeContainer;