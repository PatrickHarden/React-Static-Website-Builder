Vue.component('update-website-details', {
    props: ['website'],

    data() {
        return {
            form: new SparkForm({
                id: '',
                firmName: '',
                firmAddress: '',
                firmCity: '',
                firmState: '',
                firmZip: '',
                firmLat: '',
                firmLong: '',
                firmLogo: '',
                firmAbout: '',
                firmAction: '',
                areaOneCheck: '',
                areaOne: '',
                areaOneIcon: '',
                areaTwoCheck: '',
                areaTwo: '',
                areaTwoIcon: '',
                areaThreeCheck: '',
                areaThree: '',
                areaThreeIcon: '',
                areaFourCheck: '',
                areaFour: '',
                areaFourIcon: '',
                areaFiveCheck: '',
                areaFive: '',
                areaFiveIcon: '',
                areaSixCheck: '',
                areaSix: '',
                areaSixIcon: '',
                StaffOneCheck: '',
                staffOne: '',
                staffOneTitle: '',
                staffOneContactEmail: '',
                staffOneContactPhone: '',
                staffOneBio: '',
                StaffTwoCheck: '',
                staffTwo: '',
                staffTwoTitle: '',
                staffTwoContactEmail: '',
                staffTwoContactPhone: '',
                staffTwoBio: '',
                StaffThreeCheck: '',
                staffThree: '',
                staffThreeTitle: '',
                staffThreeContactEmail: '',
                staffThreeContactPhone: '',
                staffThreeBio: '',
                StaffFourCheck: '',
                staffFour: '',
                staffFourTitle: '',
                staffFourContactEmail: '',
                staffFourContactPhone: '',
                staffFourBio: '',
                StaffFiveCheck: '',
                staffFive: '',
                staffFiveTitle: '',
                staffFiveContactEmail: '',
                staffFiveContactPhone: '',
                staffFiveBio: '',
                StaffSixCheck: '',
                staffSix: '',
                staffSixTitle: '',
                staffSixContactEmail: '',
                staffSixContactPhone: '',
                staffSixBio: '',
                firmWelcome: '',
                firmWelcomeImg: '',
                firmAwards: '',
                firmContact: '',
                contactName: '',
                contactEmail: '',
                contactPhone: '',
                contactPref: '',
                contactMessage: '',
                contactTerms: '',
                Facebook: '',
                Twitter: '',
                LinkedIn: '',
                Instagram: '',
                Google: '',
                Pinterest: '',
                Tumblr: '',
                YouTube: '',
                Vimeo: '',
                firmAnalytics: '',
            })
        };
    },
    mounted() {
        if (!this.website) {
            return;
        }
        this.form.id = this.website.id;
        this.form.firmName = this.website.firmName;
        this.form.firmAddress = this.website.firmAddress;
        this.form.firmCity = this.website.firmCity;
        this.form.firmState = this.website.firmState;
        this.form.firmZip = this.website.firmZip;
        this.form.firmLat = this.website.firmLat;
        this.form.firmLong = this.website.firmLong;
        this.form.firmLogo = this.website.firmLogo;
        this.form.firmAbout = this.website.firmAbout;
        this.form.firmAction = this.website.firmAction;
        this.form.areaOneCheck = this.website.areaOneCheck;
        this.form.areaOne = this.website.areaOne;
        this.form.areaOneIcon = this.website.areaOneIcon;
        this.form.areaTwoCheck = this.website.areaTwoCheck;
        this.form.areaTwo = this.website.areaTwo;
        this.form.areaTwoIcon = this.website.areaTwoIcon;
        this.form.areaThreeCheck = this.website.areaThreeCheck;
        this.form.areaThree = this.website.areaThree;
        this.form.areaThreeIcon = this.website.areaThreeIcon;
        this.form.areaFourCheck = this.website.areaFourCheck;
        this.form.areaFour = this.website.areaFour;
        this.form.areaFourIcon = this.website.areaFourIcon;
        this.form.areaFiveCheck = this.website.areaFiveCheck;
        this.form.areaFive = this.website.areaFive;
        this.form.areaFiveIcon = this.website.areaFiveIcon;
        this.form.areaSixCheck = this.website.areaSixCheck;
        this.form.areaSix = this.website.areaSix;
        this.form.areaSixIcon = this.website.areaSixIcon;
        this.form.StaffOneCheck = this.website.StaffOneCheck;
        this.form.staffOne = this.website.staffOne;
        this.form.staffOneTitle = this.website.staffOneTitle;
        this.form.staffOneContactEmail = this.website.staffOneContactEmail;
        this.form.staffOneContactPhone = this.website.staffOneContactPhone;
        this.form.staffOneBio = this.website.staffOneBio;
        this.form.StaffTwoCheck = this.website.StaffTwoCheck;
        this.form.staffTwo = this.website.staffTwo;
        this.form.staffTwoTitle = this.website.staffTwoTitle;
        this.form.staffTwoContactEmail = this.website.staffTwoContactEmail;
        this.form.staffTwoContactPhone = this.website.staffTwoContactPhone;
        this.form.staffTwoBio = this.website.staffTwoBio;
        this.form.StaffThreeCheck = this.website.StaffThreeCheck;
        this.form.staffThree = this.website.staffThree;
        this.form.staffThreeTitle = this.website.staffThreeTitle;
        this.form.staffThreeContactEmail = this.website.staffThreeContactEmail;
        this.form.staffThreeContactPhone = this.website.staffThreeContactPhone;
        this.form.staffThreeBio = this.website.staffThreeBio;
        this.form.StaffFourCheck = this.website.StaffFourCheck;
        this.form.staffFour = this.website.staffFour;
        this.form.staffFourTitle = this.website.staffFourTitle;
        this.form.staffFourContactEmail = this.website.staffFourContactEmail;
        this.form.staffFourContactPhone = this.website.staffFourContactPhone;
        this.form.staffFourBio = this.website.staffFourBio;
        this.form.StaffFiveCheck = this.website.StaffFiveCheck;
        this.form.staffFive = this.website.staffFive;
        this.form.staffFiveTitle = this.website.staffFiveTitle;
        this.form.staffFiveContactEmail = this.website.staffFiveContactEmail;
        this.form.staffFiveContactPhone = this.website.staffFiveContactPhone;
        this.form.staffFiveBio = this.website.staffFiveBio;
        this.form.StaffSixCheck = this.website.StaffSixCheck;
        this.form.staffSix = this.website.staffSix;
        this.form.staffSixTitle = this.website.staffSixTitle;
        this.form.staffSixContactEmail = this.website.staffSixContactEmail;
        this.form.staffSixContactPhone = this.website.staffSixContactPhone;
        this.form.staffSixBio = this.website.staffSixBio;
        this.form.firmWelcome = this.website.firmWelcome;
        this.form.firmWelcomeImg = this.website.firmWelcomeImg;
        this.form.firmAwards = this.website.firmAwards;
        this.form.firmContact = this.website.firmContact;
        this.form.contactName = this.website.contactName;
        this.form.contactEmail = this.website.contactEmail;
        this.form.contactPhone = this.website.contactPhone;
        this.form.contactPref = this.website.contactPref;
        this.form.contactMessage = this.website.contactMessage;
        this.form.contactTerms = this.website.contactTerms;
        this.form.Facebook = this.website.Facebook;
        this.form.Twitter = this.website.Twitter;
        this.form.LinkedIn = this.website.LinkedIn;
        this.form.Instagram = this.website.Instagram;
        this.form.Google = this.website.Google;
        this.form.Pinterest = this.website.Pinterest;
        this.form.Tumblr = this.website.Tumblr;
        this.form.YouTube = this.website.YouTube;
        this.form.Vimeo = this.website.Vimeo;
        this.form.firmAnalytics = this.website.firmAnalytics;
    },

    methods: {

        update() {
            let result;
            if (this.form.id) {
                result = Spark.put('/settings/website/' + this.form.id, this.form);
            } else {
                result = Spark.post('/settings/website', this.form);
            }
            result.then(response => {
                    Bus.$emit('updateUser');
                }
            );
        }
    }
});
