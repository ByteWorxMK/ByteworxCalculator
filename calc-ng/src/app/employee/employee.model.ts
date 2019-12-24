

export class Employee {
    // public id: Number;
    public position: String;
    public role: String;
    public first_name: String;
    public last_name: String;
    public net: String;
    public brutto: String;
    public yearlynet: String;
    public yearlybrut: String;
    public socialcostmonth: String;
    public socialcostyear: String;
    public administrative: String;
    public expenses: String;
    public hardware: String;
    public othercosts: String;
    public companycostperyear: String;
    public companycostpermonth: String;
   
    public c1: String;
    public c2: String;
    public c3: String;
    public c4: String;
    public p1: String;
    public p2: String;
    public p3: String;
    public p4: String;
    public image: String;
    //public isUpdating: boolean;

    constructor ( /* id: Number,*/  position: String,  role: String,  first_name: String,  last_name: String,  net: String,  brutto: String,  yearlynet: String,  yearlybrut: String,  socialcostmonth: String,  socialcostyear: String,  administrative: String,  expenses: String,  hardware: String,  othercosts: String,  companycostperyear: String,  companycostpermonth: String, c1: String,  c2: String,  c3: String,  c4: String,  p1: String,  p2: String,  p3: String,  p4: String, image: String) {
        // this.id = id,
        this.position= position,
        this.role= role,
        this.first_name= first_name,
        this.last_name= last_name,
        this.net= net,
        this.brutto= brutto,
        this.yearlynet= yearlynet,
        this.yearlybrut= yearlybrut,
        this.socialcostmonth= socialcostmonth,
        this.socialcostyear= socialcostyear,
        this.administrative= administrative,
        this.expenses= expenses,
        this.hardware= hardware,
        this.othercosts= othercosts,
        this.companycostperyear= companycostperyear,
        this.companycostpermonth= companycostpermonth,
     
        this.c1= c1,
        this.c2= c2,
        this.c3= c3,
        this.c4= c4,
        this.p1= p1,
        this.p2= p2,
        this.p3= p3,
        this.p4= p4,
        this.image= image
        
    }
}