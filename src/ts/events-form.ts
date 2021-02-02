/**
 * @module submitContactForm
 * @description This module simply looks for a form with the name newsletter-signup
 * and passes its FormData to a webhook specified in the project endpoints
 */
import { EVENT_FORM_HOOK } from './project-endpoints';
import axios from 'axios';
import { showMessage } from './snackbar-notification';

export function submitContactForm(): void {
  const data: FormData = new FormData(this);
  axios.post(EVENT_FORM_HOOK, data)
    .then(({ data }: AxiosResponse) => {
      showMessage('Thanks, we\'ll be in touch soon!')
      this.reset()
    })
    .catch((res: Response) => {
      showMessage('Sorry, there was a problem, please try again.')
    })
}

(($) => { $("form[name=events-form]").on('submit', submitContactForm); })(jQuery);