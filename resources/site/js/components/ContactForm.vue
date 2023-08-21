<template>
  <div class="container mt-5" id="contact">
    <div class="row justify-content-evenly">
      <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-green">
        <h3 class="text-center mb-0">Contact:</h3>
      </div>
      <div class="col-12 col-xl-10">
        <div class="contact bg-white">
          <div class="row pt-3">
            <div class="col-12 form mb-3">
              <form
                action="/contact"
                method="post"
                ref="form"
                class="needs-validation"
                @submit.prevent="FormSubmit($event)"
                novalidate
              >
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input
                    type="text"
                    class="form-control rounded-0"
                    id="name"
                    name="name"
                    placeholder="Your First and Last Name"
                    required
                  />
                  <div class="invalid-feedback">Please input Your Name.</div>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control rounded-0"
                    id="email"
                    name="email"
                    placeholder="Your Email"
                    required
                  />
                  <div class="invalid-feedback">
                    Email is required to respond to your request. We do not
                    publish or transfer your contact details to third parties.
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Subject</label>
                  <div class="input-group">
                    <select
                      v-model="selectedSubject"
                      class="form-select rounded-0"
                      id="subject"
                      name="subject"
                      required
                    >
                      <option value="" selected disabled>
                        Select a subject
                      </option>
                      <option value="custom">Custom</option>
                      <option value="General inquiry">General inquiry</option>
                      <option value="I offer part-time employment">
                        I offer part-time employment
                      </option>
                      <option value="Offering full-time employment">
                        Offering full-time employment
                      </option>
                    </select>

                    <div
                      class="form-group position-relative"
                      :class="{
                        'was-validated': isFormValid && isCustomSubjectRequired,
                      }"
                      v-if="selectedSubject === 'custom'"
                    >
                      <input
                        type="text"
                        id="customSubject"
                        name="custom_subject"
                        class="form-control rounded-0"
                        :required="isCustomSubjectRequired"
                        v-model="customSubject"
                        placeholder="Your Subject"
                      />
                      <div class="invalid-feedback position-absolute">
                        Please input Your custom subject.
                      </div>
                    </div>
                    <div class="invalid-feedback">
                      Please select the subject.
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                  <textarea
                    class="form-control rounded-0"
                    id="message"
                    name="message"
                    rows="4"
                    placeholder="Your Message"
                    required
                  ></textarea>
                  <div class="invalid-feedback">Please type Your message.</div>
                </div>
                <div class="invalid-feedback text-danger" role="alert">
                  <strong class="recaptcha-error"></strong>
                </div>
                <vue-recaptcha
                  ref="recaptcha"
                  @verify="onCaptchaVerified"
                  @expired="onCaptchaExpired"
                  size="invisible"
                  sitekey="6LcZCrkbAAAAAM2jsXfhjwi1CjR2lMr2PXUgHiL6"
                >
                </vue-recaptcha>
                <button
                  type="submit"
                  class="btn btn-primary rounded-0"
                  :disabled="!isFormValid || isSubmitting"
                >
                  {{ isSubmitting ? "Submitting..." : "Submit" }}
                </button>
              </form>
            </div>
            <div
              v-if="showSuccessMessage"
              class="alert alert-success alert-dismissible mt-3 fade show"
              role="alert"
            >
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
              ></button>
              Form submitted successfully!
            </div>
            <div
              v-if="errors.length"
              class="alert alert-danger alert-dismissible mt-3 fade show"
              role="alert"
            >
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
              ></button>
              Please fix the following errors:
              <ul>
                <li v-for="error in errors" :key="error">{{ error }}</li>
              </ul>
            </div>
            <hr />
            <div class="col-12 text-center mt-3">
              <h3 class="mb-3">
                You can also visit my profiles and contact me via private
                messages:
              </h3>
              <div class="profiles row fs-4">
                <div class="col-12 col-lg-4">
                  <a
                    href="https://github.com/FirstHard"
                    target="_blank"
                    rel="nofollow noopener"
                    class="list-group-item mb-3"
                    ><i class="bi bi-github"></i> Github</a
                  >
                </div>
                <div class="col-12 col-lg-4">
                  <a
                    href="https://www.linkedin.com/in/volodymyr-buynov/"
                    target="_blank"
                    rel="nofollow noopener"
                    class="list-group-item mb-3"
                    ><i class="bi bi-linkedin"></i> Linkedin</a
                  >
                </div>
                <div class="col-12 col-lg-4">
                  <a
                    href="https://t.me/buinoff"
                    target="_blank"
                    rel="nofollow noopener"
                    class="list-group-item mb-3"
                    ><i class="bi bi-telegram"></i> Telegram</a
                  >
                </div>
                <div class="col-12 offset-lg-5 col-lg-2">
                  <a
                    href="https://www.upwork.com/freelancers/~0150d1a731b26b452f"
                    target="_blank"
                    rel="nofollow noopener"
                    class="list-group-item mb-3"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 102 28"
                      role="img"
                      aria-hidden="true"
                    >
                      <path
                        fill="#14a800"
                        d="M28.18,19.06A6.54,6.54,0,0,1,23,16c.67-5.34,2.62-7,5.2-7s4.54,2,4.54,5-2,5-4.54,5m0-13.34a7.77,7.77,0,0,0-7.9,6.08,26,26,0,0,1-1.93-5.62H12v7.9c0,2.87-1.3,5-3.85,5s-4-2.12-4-5l0-7.9H.49v7.9A8.61,8.61,0,0,0,2.6,20a7.27,7.27,0,0,0,5.54,2.35c4.41,0,7.5-3.39,7.5-8.24V8.77a25.87,25.87,0,0,0,3.66,8.05L17.34,28h3.72l1.29-7.92a11,11,0,0,0,1.36,1,8.32,8.32,0,0,0,4.14,1.28h.34A8.1,8.1,0,0,0,36.37,14a8.12,8.12,0,0,0-8.19-8.31"
                      ></path>
                      <path
                        fill="#14a800"
                        d="M80.8,7.86V6.18H77.2V21.81h3.65V15.69c0-3.77.34-6.48,5.4-6.13V6c-2.36-.18-4.2.31-5.45,1.87"
                      ></path>
                      <polygon
                        fill="#14a800"
                        points="55.51 6.17 52.87 17.11 50.05 6.17 45.41 6.17 42.59 17.11 39.95 6.17 36.26 6.17 40.31 21.82 44.69 21.82 47.73 10.71 50.74 21.82 55.12 21.82 59.4 6.17 55.51 6.17"
                      ></polygon>
                      <path
                        fill="#14a800"
                        d="M67.42,19.07c-2.59,0-4.53-2.05-4.53-5s2-5,4.53-5S72,11,72,14s-2,5-4.54,5m0-13.35A8.1,8.1,0,0,0,59.25,14,8.18,8.18,0,1,0,75.6,14a8.11,8.11,0,0,0-8.18-8.31"
                      ></path>
                      <path
                        fill="#14a800"
                        d="M91.47,14.13h.84l5.09,7.69h4.11l-5.85-8.53a7.66,7.66,0,0,0,4.74-7.11H96.77c0,3.37-2.66,4.65-5.3,4.65V0H87.82V21.82h3.64Z"
                      ></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { VueRecaptcha } from "vue-recaptcha";

export default {
  name: "ContactForm",
  components: { VueRecaptcha },
  data() {
    return {
      selectedSubject: "",
      customSubject: "",
      errors: [],
      isSubmitting: false,
      myForm: null,
      showSuccessMessage: false,
      isFormValid: true,
      shouldValidate: true,
    };
  },
  methods: {
    FormSubmit(event) {
      this.myForm = event;

      if (this.shouldValidate && !this.$refs.form.checkValidity()) {
        this.$refs.form.classList.add("was-validated");
        this.isSubmitting = false;
      } else {
        this.$refs.recaptcha.execute();
        this.isSubmitting = true;
      }
    },
    onCaptchaVerified(token) {
      this.onCaptchaExpired();

      let fData = new FormData(this.myForm.target);
      fData.append("g-recaptcha-response", token);

      axios({
        method: this.myForm.target.method,
        url: this.myForm.target.action,
        data: fData,
      })
        .then((response) => {
          this.errors = [];
          this.showSuccessMessage = true;
          this.isSubmitting = false;
          this.shouldValidate = false;
          this.resetForm();

          const form = document.querySelector(".needs-validation");
          if (form.checkValidity()) {
            this.isFormValid = true; // Проверяем валидность перед разблокировкой кнопки
          }
        })
        .catch((err) => {
          if (err.response) {
            this.errors = err.response.data.errors;
            this.isSubmitting = false;
            this.showSuccessMessage = false;
            console.error("Form submission error:", err);
          } else {
            this.isSubmitting = false;
            this.resetForm();
          }
        });
    },
    onCaptchaExpired() {
      this.$refs.recaptcha.reset();
    },
    resetForm() {
      this.myForm.target.reset();
      this.isFormValid = true;
      this.isSubmitting = false;
      this.selectedSubject = "";
    },
  },
  computed: {
    isCustomSubjectRequired() {
      return this.selectedSubject === "custom";
    },
  },
};

/* setup() {
  const { executeRecaptcha, recaptchaLoaded } = useReCaptcha();
  const recaptchaRef = ref(null);
  const formData = {
    name: "",
    email: "",
    subject: "",
    message: "",
  };

  const submitForm = async () => {
    // (optional) Wait until recaptcha has been loaded.
    await recaptchaLoaded();

    // Execute reCAPTCHA with action "login".
    const token = await executeRecaptcha("contactForm");

    const response = await fetch("/api/contact", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
      },
      body: JSON.stringify({
        recaptcha_token: token,
        formData: formData,
      }),
    });

    if (response.ok) {
      console.log("Form submitted successfully!");
      // Reset form or show success message
    } else {
      console.error("Form submission failed:", response.statusText);
    }

    // Do stuff with the received token.
    console.log(token);
  };

  return {
    recaptchaRef,
    formData,
    submitForm,
  };
}, */

/* setup() {
  const $script = document.createElement("script");
  $script.async = true;
  $script.src =
    "https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit";
  document.head.appendChild($script);

  const recaptchaRef = ref(null);
  const formData = {
    name: "",
    email: "",
    subject: "",
    message: "",
  };

  const validateAndSubmit = async () => {
    if (validateForm()) {
      recaptchaRef.value.execute();
    }
  };

  const validateForm = () => {
    if (
      !formData.name ||
      !formData.email ||
      !formData.subject ||
      !formData.message
    ) {
      // Если какие-либо обязательные поля не заполнены, вернуть false
      return false;
    }

    // Дополнительные проверки формата данных, например, для email
    if (!isValidEmail(formData.email)) {
      return false;
    }
    return true; // Верните true, если форма валидна, и false в противном случае
  };

  const isValidEmail = (email) => {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  };

  const onCaptchaExpired = () => {
    recaptchaRef.value.reset();
  };

  const submitForm = async (recaptchaToken) => {
    if (validateForm()) {
      try {
        const response = await fetch("/api/contact", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            recaptcha_response: recaptchaToken,
            formData: formData,
          }),
        });

        if (response.ok) {
          console.log("Form submitted successfully!");
          // Сбросить форму или показать сообщение об успехе
        } else {
          console.error("Form submission failed:", response.statusText);
        }
      } catch (error) {
        console.error("Form submission error:", error);
      }
    }
  };

  return {
    recaptchaRef,
    formData,
    validateAndSubmit,
    onCaptchaExpired,
    submitForm,
  };
}, */
</script>
