import { TestBed, inject } from '@angular/core/testing';

import { LibTestService } from './lib-test.service';

describe('LibTestService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [LibTestService]
    });
  });

  it('should be created', inject([LibTestService], (service: LibTestService) => {
    expect(service).toBeTruthy();
  }));
});
