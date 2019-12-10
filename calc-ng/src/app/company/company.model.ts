export class Company {
    company_name: String;
    vacation_days: String; 
    sick_days: String;
    working_days: String;
    billability: String;
    billability_year: String;
    effective_days: String;
    expected_profit: String;

    constructor( company_name: String, vacation_days: String, sick_days: String,working_days: String,billability: String,billability_year: String, effective_days: String, expected_profit: String) {
        this.company_name = company_name,
        this.vacation_days =  vacation_days,
        this.sick_days = sick_days,
        this.working_days = working_days,
        this.billability = billability,
        this.billability_year = billability_year,
        this.effective_days = effective_days,
        this.expected_profit = expected_profit
    }
}